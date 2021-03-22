<?php


namespace App\Repositories;


use App\Models\House;

class HouseRepository
{

    public function listing(){
        return House::all();
    }
}
