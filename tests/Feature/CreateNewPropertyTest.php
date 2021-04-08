<?php

namespace Tests\Feature;

use App\Models\Property;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CreateNewPropertyTest extends TestCase
{
    use RefreshDatabase, WithFaker, ProvidesUtils;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_property()
    {
        $user = $this->create_a_user();

        $response = $this->actingAs($user,'web')->post('/properties',[
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
        $user = $this->create_a_user();

        $response = $this->actingAs($user,'web')->post('/properties',[
            'landlord_id' => $user->id,
            'name' => '',
            'location' => $this->faker->address,
            'account_number' => $this->faker->bankAccountNumber
        ]);

        $response->assertSessionHasErrors('name');
        $response->assertSessionHasErrors(['name'=>'The name field is required.']);
    }

    public function test_see_property_creation_form()
    {
        $user = $this->create_a_user();

        $response = $this->actingAs($user,'web')->get('/properties/create');

        $response->assertSee('Add new property');
        $response->assertStatus(200);
    }
}
