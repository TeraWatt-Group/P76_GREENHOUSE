<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
	use HasFactory;

	public $table = 'option';
	public $primaryKey = 'option_id';

	protected $guarded = [];
}