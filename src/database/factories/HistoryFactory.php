<?php

namespace Database\Factories;

use App\Models\History;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HistoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = History::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $intervals = 0;

        return [
            'clock' => \Carbon\Carbon::now()->subDays(5)->addMinutes(5 * $intervals++)->timestamp,
            'value' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 22, $max = 24),
        ];
    }

    public function withItem($id)
    {
        return $this->state([
            'itemid' => $id,
        ]);
    }
}
