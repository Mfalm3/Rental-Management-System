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
        $this->withoutExceptionHandling();
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
}
