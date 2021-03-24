<?php

namespace Database\Factories;

use App\Models\House;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class HouseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = House::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $houses = ['single','double','bedsitter','1BR','2BR','3BR', '4BR'];
        $property = Property::first();
        return [
            'house_number' => Str::random(2),
            'price' => random_int(5000, 20000),
            'property_id' => $property->id,
            'description' => $houses[array_rand($houses)]
        ];
    }
}
