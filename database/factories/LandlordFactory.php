<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Landlord;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class LandlordFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Landlord::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'contacts' => Str::random(10)
        ];
    }
}
