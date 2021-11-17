<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipments extends Model
{
	use HasFactory;

	public $table = 'equipments';
    public $primaryKey = 'equipmentid';

    protected $guarded = [];

    public function descriptions()
    {
        return $this->hasOne(EquipmentsDescription::class, 'equipmentid');
    }

    public static function get_one($id)
    {
        return Equipments::with('descriptions')
                    ->findOrFail($id);
    }
}