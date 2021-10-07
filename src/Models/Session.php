<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    public $table = 'sessions';

    protected $appends = ['expires_at'];

    public function isExpired()
    {
        return $this->last_activity < \Carbon\Carbon::now()->subMinutes(config('session.lifetime'))->getTimestamp();
    }

    public function getExpiresAtAttribute()
    {
        return \Carbon\Carbon::createFromTimestamp($this->last_activity)->toDateTimeString();
    }
}
