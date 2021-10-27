<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentsDescription extends Model
{
	use HasFactory;

	public $table = 'equipments_description';
	public $primaryKey = 'equipmentid';
}