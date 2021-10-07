<?php

namespace Terawatt\Greenhouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcp extends Model
{
	use HasFactory;

	public $table = 'rcp';

	// Disable Laravel's mass assignment protection
	protected $guarded = [];
}