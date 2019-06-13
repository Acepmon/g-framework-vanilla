<?php

namespace App;

use App\Menu;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

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

    public function pages()
    {
        return $this->hasMany('App\Page', 'author_id');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Permission', 'user_permission');
    }

    public function settings()
    {
        return $this->hasMany('App\Setting');
    }

    public function getMenusAttribute()
    {
        return $this->groups->pluck('menus')->collapse();
    }
}
