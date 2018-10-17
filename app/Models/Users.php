<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    /**
     * Определяет необходимость отметок времени для модели.
     *
     * @var bool
     */
    public $timestamps = true;


    // bad solution
    protected function updateTimestamps()
    {
        $time = $this->freshTimestamp();

        if ( ! $this->exists && ! $this->isDirty(static::CREATED_AT))
        {
            $this->setCreatedAt($time);
        }
    }

}
