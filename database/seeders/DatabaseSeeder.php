<?php

namespace Database\Seeders;

use App\Models\Hotelreservation;
use App\Models\User;
use App\Models\Tourgroup;
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
      // $user =  User::factory()->create();
      Hotelreservation::factory(5)->create();
    }
}
