<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateNewPropertyTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_property()
    {
        $user = User::factory(1)->userType('Landlord')->create()->first();

        $response = $this->post('/properties',[
            'landlord_id' => $user->id,
            'name' => $this->faker->name,
            'location' => $this->faker->address,
            'account_number' => $this->faker->bankAccountNumber
        ]);
        $response->assertStatus(201);
        $response->assertRedirect('/properties');

        $property = Property::first();

        $this->assertNotNull($property);
    }

    public function test_create_property_with_missing_details()
    {
        $user = User::factory(1)->userType('Landlord')->create()->first();

        $response = $this->post('/properties',[
            'landlord_id' => $user->id,
            'name' => '',
            'location' => $this->faker->address,
            'account_number' => $this->faker->bankAccountNumber
        ]);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors(['name'=>'The name field is required.']);
    }
}
