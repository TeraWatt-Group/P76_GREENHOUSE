<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
	use HasFactory;

	public $table = 'equipment';
    public $primaryKey = 'equipment_id';

    protected $fillable = [
        'sku',
        'image',
        'sort_order',
        'status',
    ];

    public function description()
    {
        return $this->hasOne(EquipmentDescription::class, 'product_id');
    }
}