<?php

namespace Larabook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request for the registration of a new user.
 *
 * @package Larabook\Http\Requests
 */
class RegisterUserRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {

        return true;

    }

    /**
     * @return array
     */
    public function rules()
    {

        return [

            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',

        ];

    }

}
