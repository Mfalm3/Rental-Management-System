<?php


namespace Tests\Feature;


use App\Models\House;
use App\Models\Property;
use App\Models\User;

trait ProvidesUtils
{

    public function build_a_house($count=1)
    {

        $landlord = User::factory()->userType('landlord')->count(1)->create()->first();

        $property = Property::factory([
            'landlord_id'=> $landlord->id,
        ])->count($count)->create()->first();

        $this->house = House::factory()->create([
            'property_id' => $property->id,
            'house_number' => 'B1'
        ]);

    }

    public function create_a_user($user = 'agent')
    {
        return User::factory()->userType($user)->create()->first();
    }
}
