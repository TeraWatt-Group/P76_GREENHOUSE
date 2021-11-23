<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use App\Models\Category;
use App\Models\CategoryDescription;
use App\Models\Product;
use App\Models\ProductDescription;
use App\Models\Option;
use App\Models\Rcp;

class GreenSeeder extends Seeder
{
    static $ADMIN_NAME = 'Administrator';
    static $ADMIN_EMAIL = 'admin@green.com';
    static $ADMIN_PASSWORD = 'saccade2';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create admin user
        $user = User::updateOrCreate([
            'name' => self::$ADMIN_NAME,
        ],[
            'name' => self::$ADMIN_NAME,
            'email' => self::$ADMIN_EMAIL,
            'password' =>  bcrypt(self::$ADMIN_PASSWORD),
            'status' =>  User::TYPES['ADMIN_TYPE'],
        ]);

        if (Category::count() == 0) {
            Category::insert([
                [
                    'category_id' => 1,
                    'parent_id' => 0,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ],
                [
                    'category_id' => 2,
                    'parent_id' => 0,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ],
                [
                    'category_id' => 3,
                    'parent_id' => 0,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ]
            ]);
            CategoryDescription::insert([
                [
                    'category_id' => 1,
                    'name' => 'Салати',
                    'description' => 'Салати'
                ],
                [
                    'category_id' => 2,
                    'name' => 'Мікрозелень',
                    'description' => 'Мікрозелень'
                ],
                [
                    'category_id' => 3,
                    'name' => 'Петрушка',
                    'description' => 'Петрушка'
                ]
            ]);
        } else { echo "Category table is not empty\n"; }

        if (Product::count() == 0) {
            Product::insert([
                [
                    'image' => '/img/product/parsley.jpg',
                    'date_available' => '1990-01-01',
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ],
                [
                    'image' => '/img/product/redis.png',
                    'date_available' => '1990-01-01',
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ],
                [
                    'image' => '/img/product/rukkola.png',
                    'date_available' => '1990-01-01',
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ],
                [
                    'image' => '/img/product/spinach.jpeg',
                    'date_available' => '1990-01-01',
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
                ]
            ]);

            ProductDescription::insert([
                [
                    'productid' => 1,
                    'language_id' => 1,
                    'name' => 'Петрушка кучерява',
                    'description' => 'Петрушка кучерява',
                ],
                [
                    'productid' => 2,
                    'language_id' => 1,
                    'name' => 'Редис',
                    'description' => 'Редис',
                ],
                [
                    'productid' => 3,
                    'language_id' => 1,
                    'name' => 'Руккола',
                    'description' => 'Руккола',
                ],
                [
                    'productid' => 4,
                    'language_id' => 1,
                    'name' => 'Шпинат',
                    'description' => 'Шпинат',
                ],
            ]);

            DB::table('product_image')->insert([
                [
                    'product_image_id' => 1,
                    'productid' => 1,
                    'image' => '/img/product/parsley.jpeg',
                ],
                [
                    'product_image_id' => 2,
                    'productid' => 1,
                    'image' => '/img/product/parsley.jpeg',
                ],
                [
                    'product_image_id' => 3,
                    'productid' => 2,
                    'image' => '/img/product/redis.png',
                ],
                [
                    'product_image_id' => 4,
                    'productid' => 2,
                    'image' => '/img/product/redis.png',
                ],
                [
                    'product_image_id' => 5,
                    'productid' => 3,
                    'image' => '/img/product/rukkola.png',
                ],
                [
                    'product_image_id' => 6,
                    'productid' => 3,
                    'image' => '/img/product/rukkola.png',
                ],
                [
                    'product_image_id' => 7,
                    'productid' => 4,
                    'image' => '/img/product/spinach.jpeg',
                ],
                [
                    'product_image_id' => 8,
                    'productid' => 4,
                    'image' => '/img/product/spinach.jpeg',
                ],
            ]);

            DB::table('product_to_category')->insert([
                [
                    'productid' => 1,
                    'category_id' => 3,
                ],
                [
                    'productid' => 2,
                    'category_id' => 1,
                ],
                [
                    'productid' => 3,
                    'category_id' => 1,
                ],
                [
                    'productid' => 4,
                    'category_id' => 2,
                ],
            ]);
        } else { echo "Product table is not empty\n"; }

        if (Option::count() == 0) {
            Option::insert([
                [
                    'type' => 'text',
                    'sort_order' => '1',
                ],
                [
                    'type' => 'date',
                    'sort_order' => '2',
                ],
                [
                    'type' => 'time',
                    'sort_order' => '3',
                ],
                [
                    'type' => 'datetime',
                    'sort_order' => '4',
                ],
                [
                    'type' => 'integer',
                    'sort_order' => '5',
                ],
                [
                    'type' => 'float',
                    'sort_order' => '6',
                ],
                [
                    'type' => 'bool',
                    'sort_order' => '7',
                ]
            ]);
        } else { echo "Option table is not empty\n"; }

        Rcp::insert([
            [
                'rcpid' => '1',
                'rcp_version' => '1.0.0',
                'productid' => '1',
            ],
            [
                'rcpid' => '2',
                'rcp_version' => '2.0.0',
                'productid' => '1',
            ],
        ]);
    }
}
