<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_uint extends Model
{
	use HasFactory;

	public $table = 'history_uint';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
        'itemsid',
        'clock',
        'value',
    ];
}