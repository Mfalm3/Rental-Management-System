<?php

namespace Database\Seeders;

use App\Models\AdListing;
use Illuminate\Database\Seeder;

class AdListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AdListing::factory()->count(10)->create();
    }
}
