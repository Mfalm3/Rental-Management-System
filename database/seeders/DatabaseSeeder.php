<?php

namespace Database\Seeders;

use App\Models\House;
use App\Models\Landlord;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       //  \App\Models\User::factory(1)->create();

         //new landlord
        $landlord = User::factory()->userType('landlord')->create([
            'email' => 'one@landlord.com'
        ]);

        // new property
        $property = Property::factory()->create([
            'landlord_id' => $landlord->typeable->id
        ]);

        // new house
        $house = House::factory(5)->create([
            'property_id' => $property->id,
        ]);

        // new Tenant
        $tenant = User::factory()->userType('tenant')->create([
            'email' => 'one@tenant.com'
        ]);



    }
}
