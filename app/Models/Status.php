<?php

namespace Larabook\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Larabook\Presenters\StatusPresenter;
use Laracasts\Presenter\PresentableTrait;

/**
 * A user's status.
 *
 * @package Larabook\Models
 */
class Status extends Model
{

    use PresentableTrait;

    /**
     * @var array
     */
    protected $fillable = ['body', 'user_id'];

    /**
     * @var string
     */
    protected $presenter = StatusPresenter::class;

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

    /**
     * The user that created the status.
     *
     * @return BelongsTo
     */
    public function user()
    {

        return $this->belongsTo(User::class, 'user_id');

    }

}
