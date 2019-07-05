<?php

namespace App;

use App\Menu;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;
use Laravel\Passport\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable implements MustVerifyEmail, CanResetPassword
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
        return $this->belongsToMany('App\Group', 'user_group');
    }

    public function contents()
    {
        return $this->hasMany('App\Content', 'author_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'user_permission')->withPivot('is_granted');
    }

    public function getAllPermissionsAttribute()
    {
        $group_permissions = $this->groups->pluck('permissions');
        return $group_permissions->prepend($this->permissions)->collapse();
    }

    public function hasPermission($permission_title)
    {
        $permission = $this->allPermissions->where('title', '=', $permission_title);
        if ($permission && $permission->first())
        {
            /*
            Prioritizes user permission rather than group permission
            */
            return $permission->first()->pivot->is_granted;

            /*
            Checks if user has permission either in user or in group.
            */
            // return $permission->pluck('pivot.is_granted')->contains(true);
        }
        return true;
    }

    public function settings()
    {
        return $this->hasMany('App\Setting');
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

    public function is_admin()
    {
        return $this->groups->contains(Group::find(1));
    }

    public function is_operator()
    {
        return $this->groups->contains(Group::find(2));
    }

    public function is_member()
    {
        return $this->groups->contains(Group::find(3));
    }

    public function is_guest()
    {
        return $this->groups->contains(Group::find(4));
    }
}
