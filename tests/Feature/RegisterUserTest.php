<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_user()
    {
        $response = $this->post('/register',[
            'name'     => $this->faker->firstName(),
            //'lname'     => $this->faker->lastName(),
            'email'     => $this->faker->email(),
            'password'  => $this->faker->password(8),
           //'password_confirmation' => 'super-secret'
        ]);

        $response->assertRedirect('/');
        $response->assertStatus(302);
    }

}
