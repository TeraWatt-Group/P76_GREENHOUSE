<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	use HasFactory;

	public $table = 'orders';
	public $primaryKey = 'orderid';

	public function equipments()
	{
	    return $this->hasOne(EquipmentsDescription::class, 'equipmentid');
	}

	public function products()
	{
	    return $this->hasOne(ProductDescription::class, 'productid');
	}

	public function rcps()
	{
	    return $this->hasOne(Rcp::class, 'rcpid');
	}
}