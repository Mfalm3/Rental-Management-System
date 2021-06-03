<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateAdListingTest extends TestCase
{
    use RefreshDatabase, WithFaker, ProvidesUtils;
    /**
     * A test for ad listing creation .
     *
     * @return void
     */
    public function test_create_an_ad()
    {
        $user = $this->create_a_user('agent');

        $response = $this->actingAs($user)->post('/ad',[
            'uuid' => $this->faker->uuid,
            'description'   => $this->faker->paragraph(3),
            'price'         => $this->faker->numberBetween(5000, 30000),
            'location'      => $this->faker->address,
            'contact'       => $this->faker->phoneNumber,
            'images'        => 'image.png'
        ]);

        $response->assertStatus(201);
    }

    public function test_create_an_ad_with_multiple_images()
    {
        $user = $this->create_a_user('agent');

        $response = $this->actingAs($user)->post('/ad',[
            'uuid' => $this->faker->uuid,
            'description'   => $this->faker->paragraph(3),
            'price'         => $this->faker->numberBetween(5000, 30000),
            'location'      => $this->faker->address,
            'contact'       => $this->faker->phoneNumber,
            'images'        => ['image1.png','image2.png']
        ]);

        $response->assertStatus(201);
    }

    public function test_create_ad_with_missing_details()
    {
        $user = $this->create_a_user('agent');

        $response = $this->actingAs($user,'web')->post('/ad',[
            'description' => 'sample description',
            'price' => $this->faker->numberBetween(5000, 30000),
            'location' => '',
            'contact' => $this->faker->phoneNumber,
            'images' => ['image1.png','image2.png']
        ]);


        $response->assertSessionHasErrors('location');
        $response->assertSessionHasErrors([
            'location' => 'The location field is required.'
        ]);
    }
}
