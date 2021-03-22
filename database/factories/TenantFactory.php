<?php

namespace Database\Factories;

use App\Models\House;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TenantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tenant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $house = House::first();
        return [
            'contacts'=> Str::random(10),
            'house_id' => $house->id
        ];
    }
}
