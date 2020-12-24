<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticate;
use Illuminate\Notifications\Notifiable;

class User extends Authenticate
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function isAdmin()
    {
        return $this->roles()->where('name', 'admin')->exists();
    }

    public function isUser() // Бля чё за хуЙня
    {
        $user = $this->roles()->where('name', 'user')->exists();
        if ($user){
            return "user";
        }
    }

    public function isDisabled(){ // дабл хуЙня 2.0
        $disabled = $this->roles()->where('name', 'disabled')->exists();
        if ($disabled) {
            return "disabled";
        }
    }

    public function isVisitor()
    {
        $user = $this->roles()->where('name', '')->exists();
        if ($user){
            return "user";
        }
    }

}
