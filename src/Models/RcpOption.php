<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RcpOption extends Model
{
	use HasFactory;

	public $table = 'rcp_option';
	public $primaryKey = 'rcp_option_id';

	protected $guarded = [];
}