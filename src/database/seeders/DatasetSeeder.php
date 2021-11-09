<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Equipments;
use App\Models\Items;
use App\Models\History;
use App\Models\History_uint;

class DatasetSeeder extends Seeder
{
    public function run()
    {
        DB::table('items_value_type')->insert([
            [
                'value_typeid' => 0,
                'name' => 'Numeric (float)',
            ],
            [
                'value_typeid' => 1,
                'name' => 'Character',
            ],
            [
                'value_typeid' => 2,
                'name' => 'Log',
            ],
            [
                'value_typeid' => 3,
                'name' => 'Numeric (unsigned)',
            ],
            [
                'value_typeid' => 4,
                'name' => 'Text',
            ],
        ]);

        if (Equipments::count() == 0) {
            Equipments::insert([
                [
                    'equipmentid' => 1,
                    'status' => 1,
                ],
                [
                    'equipmentid' => 2,
                    'status' => 1,
                ],
                [
                    'equipmentid' => 3,
                    'status' => 1,
                ]
            ]);
            DB::table('equipments_description')->insert([
                [
                    'equipmentid' => 1,
                    'language_id' => 1,
                    'name' => 'Теплиця №1',
                ],
                [
                    'equipmentid' => 2,
                    'language_id' => 1,
                    'name' => 'Теплиця №2',
                ],
                [
                    'equipmentid' => 3,
                    'language_id' => 1,
                    'name' => 'Теплиця №3',
                ]
            ]);
            DB::table('users_equipments')->insert([
                [
                    'uequipmentid' => 1,
                    'userid' => 1,
                    'equipmentid' => 1,
                    'status' => 1,
                    'created_at' => time(),
                    'uuid' => \Str::uuid(),
                ]
            ]);
        } else { echo "Equipments table is not empty\n"; }

        if (Items::count() == 0) {
            Items::insert([
                [
                    'itemid' => 1,
                    'equipmentid' => 1,
                    'name' => 'Температура',
                    'key_' => \Str::slug('Температура', '_'),
                    'delay' => '15s',
                    'history' => '4w',
                    'value_type' => 0,
                    'status' => 1,
                    'units' => '°C',
                    'uuid' => \Str::uuid(),
                ],
                [
                    'itemid' => 2,
                    'equipmentid' => 1,
                    'name' => 'CO2',
                    'key_' => \Str::slug('CO2', '_'),
                    'delay' => '15s',
                    'history' => '4w',
                    'value_type' => 3,
                    'status' => 1,
                    'units' => '',
                    'uuid' => \Str::uuid(),
                ],
                [
                    'itemid' => 3,
                    'equipmentid' => 1,
                    'name' => 'Світло',
                    'key_' => \Str::slug('Світло', '_'),
                    'delay' => '',
                    'history' => '4w',
                    'value_type' => 3,
                    'status' => 1,
                    'units' => '',
                    'uuid' => \Str::uuid(),
                ]
            ]);
        } else { echo "Items table is not empty\n"; }

        History::truncate();

        // History::factory()
        //     ->count(1612)
        //     // ->count(161280)
        //     ->withItem(1)
        //     ->create();

        // History::factory()
        //     ->count(1612)
        //     // ->count(161280)
        //     ->withItem(2)
        //     ->create();

        // History::factory()
        //     ->count(1612)
        //     // ->count(161280)
        //     ->withItem(3)
        //     ->create();

        // History_uint::factory()
        //     ->count(9999)
        //     ->create();
    }
}
