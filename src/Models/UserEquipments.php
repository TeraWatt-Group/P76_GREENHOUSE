<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEquipments extends Model
{
	use HasFactory;

	public $table = 'users_equipments';
	public $primaryKey = 'uequipmentid';

	protected $guarded = [];
}