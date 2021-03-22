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
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->json('POST','/register',[
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'type' => 'landlord',
            'contacts' => '0712345678'
        ]);

        $this->assertAuthenticated();
        $response->assertStatus(302);
        $response->assertRedirect(RouteServiceProvider::HOME);

        $user = User::first();
        $landlord = Landlord::first();

        $this->assertNotNull($user);
        $this->assertNotNull($landlord);
        $this->assertEquals($user->name, $landlord->user->name);
    }
}
