<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
	use HasFactory;

	public $table = 'history';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
        'itemsid',
        'clock',
        'value',
    ];
}