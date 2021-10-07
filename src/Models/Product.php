<?php

namespace Terawatt\Greenhouse\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use HasFactory;

	public $table = 'product';

	// Disable Laravel's mass assignment protection
	protected $guarded = [];

    public static function get_one_product()
    {
        return Product::leftJoin('product_description', 'product_description.product_id', 'product.product_id')
        			->get();
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