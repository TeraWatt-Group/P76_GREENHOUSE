<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	public $table = 'products';
    public $primaryKey = 'productid';

	protected $guarded = [];

    public function descriptions()
    {
        return $this->hasOne(ProductDescription::class, 'productid');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class, 'productid');
    }

    public function category()
    {
        return $this->hasOne(ProductToCategory::class, 'productid');
    }

    public function rcp()
    {
        return $this->hasMany(Rcp::class, 'productid');
    }

    public static function get_one($id)
    {
        return Product::with('descriptions')
                    ->with('images')
        			->findOrFail($id);
    }

    public static function get_all_product()
    {
        return Product::select(\DB::raw('products.productid as productid, products.image as image, product_description.name as name, product_description.description as description, category_description.name as category'))
                    ->leftJoin('product_description', 'product_description.productid', 'products.productid')
                    ->leftJoin('product_to_category', 'product_to_category.productid', 'products.productid')
                    ->leftJoin('category_description', 'category_description.category_id', 'product_to_category.category_id')
        			->orderBy('products.sort_order')
                    ->get();
    }

    public static function get_product_image()
    {
        return Product::leftJoin('product_image', 'product_image.productid', '=', 'products.productid')
                    ->get();
    }
}