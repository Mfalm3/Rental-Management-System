<?php

namespace Database\Factories;

use App\Models\AdListing;
use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdListingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdListing::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'   => $this->faker->paragraph(3),
            'price'         => $this->faker->numberBetween(5000, 30000),
            'location'      => $this->faker->address(),
            'contact'       => $this->faker->phoneNumber(),
        ];
    }
}
