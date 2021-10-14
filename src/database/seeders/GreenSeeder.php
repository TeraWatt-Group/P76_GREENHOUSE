<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;
use App\Models\Product;
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
        ]);

        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        DB::statement("SET foreign_key_checks=0");
        Role::truncate();
        DB::statement("SET foreign_key_checks=1");

        Role::create(['name' => 'super-admin']);
        // Role::create(['name' => 'qr']);
        // $role = Role::create(['name' => 'bpmn']);

        // Permission::create(['name' => 'bpmn-view']);
        // Permission::create(['name' => 'bpmn-edit']);
        // $role->syncPermissions(['bpmn-view', 'bpmn-edit']);

        $user->roles()->detach();
        $user->assignRole('super-admin');

        // check if table users is empty
        if (Product::count() == 0) {

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
        } else { echo "Option table is not empty"; }

        Rcp::insert([
            [
                'rcp_version' => '1.0.0',
                'product_id' => '1',
            ],
            [
                'rcp_version' => '2.0.0',
                'product_id' => '1',
            ],
        ]);
    }
}
