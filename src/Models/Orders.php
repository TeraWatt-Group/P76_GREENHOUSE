<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
	use HasFactory;

	public $table = 'orders';
	public $primaryKey = 'orderid';

	protected $guarded = [];

	public function equipments()
	{
	    return $this->hasOne(UserEquipments::class, 'uequipmentid', 'uequipmentid')
	    	->leftJoin('equipments_description', 'equipments_description.equipmentid', '=', 'users_equipments.equipmentid');
	}

	public function products()
	{
	    return $this->hasOne(ProductDescription::class, 'productid', 'productid');
	}

	public function rcps()
	{
	    return $this->hasOne(Rcp::class, 'rcpid', 'rcpid');
	}

	public static function in_progres($userid)
	{
		return Orders::where('status', 0)->where('userid', $userid)->count();
	}
}