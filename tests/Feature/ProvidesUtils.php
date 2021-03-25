<?php


namespace Tests\Feature;


use App\Models\House;
use App\Models\Landlord;
use App\Models\Property;

trait ProvidesUtils
{

    public function build_a_house()
    {

        $landlord = Landlord::factory(1)->create()->first();

        $property = Property::factory([
            'landlord_id'=> $landlord->id,
        ])->create()->first();

        $this->house = House::factory()->create([
            'property_id' => $property->id,
            'house_number' => 'B1'
        ]);

    }
}
