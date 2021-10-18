<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	public $table = 'product';
    public $primaryKey = 'product_id';

	protected $guarded = [];

    public function description()
    {
        return $this->hasOne(ProductDescription::class, 'product_id');
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function rcp()
    {
        return $this->hasMany(Rcp::class, 'product_id');
    }

    public static function get_one_product($id)
    {
        return Product::leftJoin('product_description', 'product_description.product_id', 'product.product_id')
        			->findOrFail($id);
    }

    public static function get_all_product()
    {
        return Product::leftJoin('product_description', 'product_description.product_id', 'product.product_id')
        			->orderBy('product.sort_order')
                    ->get();
    }

    public static function get_product_image()
    {
        return Product::leftJoin('product_image', 'product_image.product_id', '=', 'product.product_id')
                    ->get();
    }
}