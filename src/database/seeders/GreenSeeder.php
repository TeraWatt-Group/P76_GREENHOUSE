<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Terawatt\Greenhouse\Models\Product;
use DB;

class GreenSeeder extends Seeder
{
    static $ADMIN_PASSWORD = 'saccade2';
    static $ADMIN_EMAIL = 'admin@green.com';
    static $ADMIN_NAME = 'Administrator';
    static $ADMIN_SURNAME = 'Saccade';

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
            'password' =>  bcrypt(self::$ADMIN_PASSWORD),
            'email' => self::$ADMIN_EMAIL,
        ]);

        // check if table users is empty
        if(Product::count() == 0){

            Product::insert([
                [
                    'image' => '/img/product/parsley.jpg',
                    'date_available' => '1990-01-01',
                ],
                [
                    'image' => '/img/product/redis.png',
                    'date_available' => '1990-01-01',
                ],
                [
                    'image' => '/img/product/rukkola.png',
                    'date_available' => '1990-01-01',
                ]

            ]);

            DB::table('product_description')->insert([
                [
                    'product_id' => 1,
                    'language_id' => 1,
                    'name' => 'Петрушка кучерявая',
                    'description' => 'Петрушка кучерявая',
                ],
                [
                    'product_id' => 2,
                    'language_id' => 1,
                    'name' => 'Редис',
                    'description' => 'Редис',
                ],
                [
                    'product_id' => 3,
                    'language_id' => 1,
                    'name' => 'Руккола',
                    'description' => 'Руккола',
                ],
            ]);

        } else { echo "Product table is not empty"; }
    }
}
