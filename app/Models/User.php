<?php

namespace Larabook\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * A user of the application.
 *
 * @package Larabook\Models
 */
class User extends Authenticatable
{

    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Register a new user.
     *
     * @param $name
     * @param $email
     * @param $password
     * @return User
     */
    public static function register($name, $email, $password)
    {

        $user = new static(compact('name', 'email', 'password'));

        return $user;

    }

    /**
     * Hash the password.
     *
     * @param $password
     */
    public function setPasswordAttribute($password)
    {

        $this->attributes['password'] = bcrypt($password);

    }

}
