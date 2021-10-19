<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	use HasFactory;

	public $table = 'category';
    public $primaryKey = 'category_id';

	protected $guarded = [];

    public function description()
    {
        return $this->hasOne(CategoryDescription::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(ProductToCategory::class, 'category_id');
    }
}