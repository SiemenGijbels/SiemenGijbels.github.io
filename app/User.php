<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Traits\CanResetPassword;
use App\Notifications\CustomPasswordReset;

class User extends Authenticatable
{
    use Notifiable, CanResetPassword;

    public function sendPasswordResetNotification($token) {
        $this->notify(new CustomPasswordReset($token));
    }


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
}