<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tourgroup;
use App\Models\Transport;
use Illuminate\Database\Seeder;
use App\Models\Hotelreservation;
use App\Models\Itinarary;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // $user =  User::factory()->create();
     Hotelreservation::factory(5)->create();
      Itinarary::factory(5)->create();
    }
}
