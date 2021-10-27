<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use App\Models\Equipment;
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

        if (Equipment::count() == 0) {
            Equipment::insert([
                [
                    'equipment_id' => 1,
                    'status' => 1,
                    'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
                    'uuid' => \Str::uuid(),
                ]
            ]);
            DB::table('equipment_description')->insert([
                [
                    'equipment_id' => 1,
                    'language_id' => 1,
                    'name' => 'Теплица №1',
                    'version' => '1.0.0',
                ]
            ]);
        } else { echo "Equipment table is not empty\n"; }

        if (Items::count() == 0) {
            Items::insert([
                [
                    'itemid' => 1,
                    'equipmentid' => 1,
                    'name' => 'Температура',
                    'key_' => \Str::slug('Температура', '_'),
                    'delay' => '5m',
                    'history' => '4w',
                    'value_type' => 0,
                    'status' => 1,
                    'units' => '°C',
                    'uuid' => \Str::uuid(),
                ],
                [
                    'itemid' => 2,
                    'equipmentid' => 1,
                    'name' => 'Вологість',
                    'key_' => \Str::slug('Вологість', '_'),
                    'delay' => '5m',
                    'history' => '4w',
                    'value_type' => 0,
                    'status' => 1,
                    'units' => '%',
                    'uuid' => \Str::uuid(),
                ],
                [
                    'itemid' => 3,
                    'equipmentid' => 1,
                    'name' => 'CO2',
                    'key_' => \Str::slug('CO2', '_'),
                    'delay' => '5m',
                    'history' => '4w',
                    'value_type' => 3,
                    'status' => 1,
                    'units' => '',
                    'uuid' => \Str::uuid(),
                ],
                [
                    'itemid' => 4,
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

        History::factory()
            ->count(10080)
            ->withItem(1)
            ->create();

        History::factory()
            ->count(10080)
            ->withItem(2)
            ->create();

        // History_uint::factory()
        //     ->count(9999)
        //     ->create();
    }
}
