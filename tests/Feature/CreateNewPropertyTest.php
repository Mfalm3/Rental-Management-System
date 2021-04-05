<?php

namespace Tests\Feature;

use App\Models\Property;
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
        $response = $this->post('/property',[
            'landlord_id' => 1,
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
