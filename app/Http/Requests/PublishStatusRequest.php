<?php

namespace Larabook\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Request to publish a new status.
 *
 * @package Larabook\Http\Requests
 */
class PublishStatusRequest extends FormRequest
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

            'status' => 'required',

        ];

    }

}
