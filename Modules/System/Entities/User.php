<?php

namespace Modules\System\Entities;

use Auth;
use Str;
use Modules\System\Entities\Menu;
use Modules\System\Entities\Group;
use Modules\System\Entities\UserMeta;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements CanResetPassword
{
    use HasApiTokens, Notifiable;

    const LANG_EN = 'en';
    const LANG_MN = 'mn';

    const LANG_ARRAY = [
        self::LANG_EN,
        self::LANG_MN
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'name', 'avatar', 'language',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->belongsToMany('Modules\System\Entities\Group', 'user_group');
    }

    public function contents()
    {
        return $this->hasMany('Modules\Content\Entities\Content', 'author_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('Modules\System\Entities\Permission', 'user_permission')->withPivot('is_granted');
    }

    public function comments()
    {
        return $this->hasMany('Modules\Content\Entities\Comment', 'author_id');
    }

    public function getAllPermissionsAttribute()
    {
        $group_permissions = $this->groups->pluck('permissions');
        return $group_permissions->prepend($this->permissions)->collapse();
    }

    public function hasPermission($permission_title)
    {
        $permission = $this->allPermissions->where('title', '=', $permission_title);
        if ($permission)
        {
            return $permission->first();
        }
        return false;
    }

    public function permissionGranted($permission_title)
    {
        $permission = $this->hasPermission($permission_title);
        if ($permission)
        {
            /*
            Prioritizes user permission rather than group permission
            */
            return $permission->pivot->is_granted;

            /*
            Checks if user has permission either in user or in group.
            */
            // return $permission->pluck('pivot.is_granted')->contains(true);
        }
        return false;
    }

    public function settings()
    {
        return $this->hasMany('App\Setting');
    }

    public function metas()
    {
        return $this->hasMany('Modules\System\Entities\UserMeta');
    }

    public function metaValue($key, $value = Null) {
        try {
            $meta = $this->metas->where('key', $key)->first();
            if ($meta)
                return $meta->value;
        } catch (\Exception $ex) {
            return $value;

        }
        return $value;
    }

    public function metaArray($key) {
        try {
            $meta = $this->metas->where('key', $key);
            if ($meta) {
                return $meta->transform(function ($item) {
                    return $item->value;
                });
            }
        } catch (\Exception $ex) {
            return Null;

        }
        return Null;
    }

    public function metasTransform() {
        $arr = [];
        foreach ($this->metas->groupBy('key')->toArray() as $key => $metaValues) {
            if (count($metaValues) > 1) {
                $arr[$key] = array_map(function ($meta) {
                    return $this->isJson($meta['value']) ? json_decode($meta['value']) : $meta['value'];
                }, $metaValues);
            } else {
                $arr[$key] = $this->isJson($metaValues[0]['value']) ? json_decode($metaValues[0]['value']) : $metaValues[0]['value'];
            }
        }
        return $arr;
    }

    private function isJson($string) {
        return ((is_string($string) &&
                (is_object(json_decode($string)) ||
                is_array(json_decode($string))))) ? true : false;
    }

    public function newMeta($key, $value) {
        try {
            $newMeta = new UserMeta();
            $newMeta->user_id = $this->id;
            $newMeta->key = $key;
            $newMeta->value = $value;
            $newMeta->save();
            return $newMeta;
        } catch (\Exception $ex) {
            return Null;
        }
        return Null;
    }

    public function setMetaValue($key, $value) {
        try {
            $meta = $this->metas->where('key', $key)->first();
            if (isset($meta)) {
                $meta->value = $value;
                $meta->save();
                return $meta;
            } else {
                $newMeta = new UserMeta();
                $newMeta->user_id = $this->id;
                $newMeta->key = $key;
                $newMeta->value = $value;
                $newMeta->save();
                return $newMeta;
            }
        } catch (\Exception $ex) {
            return Null;
        }
        return Null;
    }

    public function getMenusAttribute()
    {
        return $this->groups->pluck('menus')->collapse();
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function is($groupId)
    {
        return $this->groups->contains(Group::find($groupId));
    }

    public function is_admin()
    {
        return $this->is(1);
    }

    public function is_operator()
    {
        return $this->is(2);
    }

    public function is_member()
    {
        return $this->is(3);
    }

    public function is_guest()
    {
        return $this->is(4);
    }

    public function get_dealer_group()
    {
        $groups = $this->groups;
        foreach ($groups as $group) {
            if ($group->parent_id == Group::where('title', 'Auto Dealer')->first()->id) {
                return $group;
            }
        }
        return null;
    }

    public function avatar_url()
    {
        if (isset($this->avatar)) {
            if (Str::startsWith($this->avatar, 'http')) {
                return $this->avatar;
            }
            // $imagepath = 'public/' . $this->avatar;
            // if (!Storage::disk('local')->exists($imagepath)) {
            //     $image = Storage::disk('ftp')->get($imagepath);
            //     Storage::disk('local')->put($imagepath, $image);
            // }
			return $this->avatar;
            //return Storage::disk('local')->url($this->avatar);
        }

        return asset(config('system.avatar.default'));
    }
}
