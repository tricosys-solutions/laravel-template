<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
//Trait for sending notifications in laravel
use Illuminate\Notifications\Notifiable;
//Notification for Seller
use App\Notifications\AdminResetPasswordNotification;

class Admin extends Authenticatable {

    // This trait has notify() method defined
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

    //Send password reset notification
    public function sendPasswordResetNotification($token) {
        $this->notify(new AdminResetPasswordNotification($token));
    }

}
