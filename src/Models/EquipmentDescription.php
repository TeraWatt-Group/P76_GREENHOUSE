<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentDescription extends Model
{
	use HasFactory;

	public $table = 'equipment_description';
	public $primaryKey = 'equipment_id';
}