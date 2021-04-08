<?php

namespace Database\Factories;

use App\Models\Landlord;
use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Property::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $landlord = Landlord::first();
        $suffix = ['Heights', 'Apartments', 'Plaza'];

        return [
            'landlord_id' => $landlord->id,
            'uuid' => $this->faker->uuid,
            'name' => $this->faker->name.' '.$suffix[array_rand($suffix)],
            'location' => $this->faker->address,
            'account_number' => $this->faker->bankAccountNumber()
        ];
    }
}
