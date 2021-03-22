<?php

namespace Tests\Feature;

use App\Models\Landlord;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class PropertyRegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    private $landlord;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_new_property()
    {
        $this->withoutExceptionHandling();
        $this->create_landlord();

        $response = $this->post('/property',[
            'name' => 'Victoria Court',
            'location' => 'Kingslanding',
            'account_number' => Str::random(12),
            'landlord_id' => $this->landlord->id
        ]);

        $response->assertStatus(201);
        $response->assertSee('created property');
    }
    public function create_landlord(){

        $user = User::factory()->for(
            Landlord::factory(), 'typeable'
        )->create();
        $this->landlord = $user->typeable;
    }
}
