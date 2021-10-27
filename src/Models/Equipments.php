<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
	use HasFactory;

	public $table = 'equipments';
    public $primaryKey = 'equipmentid';

    protected $fillable = [
        'sku',
        'image',
        'sort_order',
        'status',
    ];

    public function description()
    {
        return $this->hasOne(EquipmentsDescription::class, 'equipmentid');
    }
}