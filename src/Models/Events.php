<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
	use HasFactory;

	public $table = 'events';
	public $incrementing = false;
	public $timestamps = false;

	public static function add($userid, $equipmentid, $type = '')
    {
        if ($type != '') {
            $events = new Events;
            $events->userid = $userid;
            $events->equipmentid = $equipmentid;
            $events->clock = time();
            $events->type = $type;
            $events->save();
        }
    }
}