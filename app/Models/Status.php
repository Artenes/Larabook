<?php

namespace Larabook\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * A user's status.
 *
 * @package Larabook\Models
 */
class Status extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['body', 'user_id'];

    /**
     * Publish a new status.
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {

        return new static(compact('body'));

    }

}
