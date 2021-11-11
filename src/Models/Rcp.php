<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rcp extends Model
{
	use HasFactory;

	public $table = 'rcp';
	// public $primaryKey = ['rcpid', 'rcp_version'];
	public $incrementing = false;

	protected $guarded = [];

	public function options()
	{
	    return $this->hasMany(RcpOption::class, 'rcpid', 'rcpid');
	}
}