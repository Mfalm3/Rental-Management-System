<?php

namespace Tests\Feature;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TenantCanLoginTest extends TestCase
{
    use RefreshDatabase, WithFaker, ProvidesUtils;

    protected $landlord, $house;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_tenant_can_login()
    {
        $this->withoutExceptionHandling();

        $this->build_a_house();

        $response = $this->json('POST','/register',[
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'type' => 'tenant',
            'house_id' => $this->house->id,
            'contacts' => '0712345678'
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');

        $user = User::first();
        $tenant = Tenant::first();

        $this->assertNotNull($user);
        $this->assertNotNull($tenant);

        $this->assertEquals('B1', $tenant->house->house_number);
       // $this->assertEquals('B1', $user->house->house_number);

        $response->assertStatus(302);
    }
}
