<?php

namespace Tests\Feature;

use App\Models\Landlord;
use App\Models\Tenant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandlordRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker, ProvidesUtils;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_landlord_registration()
    {
        $this->withoutExceptionHandling();
        $user = $this->create_a_user('agent');

        $newUser = [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'type' => 'landlord',
            'contacts' => '0712345678'
        ];
        $response = $this->actingAs($user,'web')->json('POST','/users/create',$newUser);

        $createdUser  = User::where('name', $newUser['name'])->first();


        $this->assertNotNull($createdUser);

        $this->assertEquals($createdUser->typeable_type,'landlord');
    }
}
