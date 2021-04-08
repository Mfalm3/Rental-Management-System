<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewPropertyTest extends TestCase
{
    use RefreshDatabase, ProvidesUtils;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_view_all_properties()
    {
        //create properties
        $this->build_a_house(2);
        $user = User::first();

        $response = $this->actingAs($user)->get('/properties');

        $response->assertStatus(200);
        $this->assertEquals(collect($response->viewData('properties'))->count(),2);
    }
}
