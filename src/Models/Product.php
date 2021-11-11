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

    public function descriptions()
    {
        return $this->hasOne(ProductDescription::class, 'product_id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function category()
    {
        return $this->hasOne(ProductToCategory::class, 'product_id');
    }

    public function rcp()
    {
        return $this->hasMany(Rcp::class, 'product_id');
    }

    public static function get_one($id)
    {
        return Product::with('descriptions')
                    ->with('images')
        			->findOrFail($id);
    }

    public static function get_all_product()
    {
        return Product::select(\DB::raw('product.product_id as product_id, product.image as image, product_description.name as name, product_description.description as description, category_description.name as category'))
                    ->leftJoin('product_description', 'product_description.product_id', 'product.product_id')
                    ->leftJoin('product_to_category', 'product_to_category.product_id', 'product.product_id')
                    ->leftJoin('category_description', 'category_description.category_id', 'product_to_category.category_id')
        			->orderBy('product.sort_order')
                    ->get();
    }

    public static function get_product_image()
    {
        return Product::leftJoin('product_image', 'product_image.product_id', '=', 'product.product_id')
                    ->get();
    }
}