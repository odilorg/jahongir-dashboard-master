<?php

namespace Database\Factories;

use App\Models\Tourgroup;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelreservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hotel_city'=>$this->faker->randomElement(['Samarkand', 'Bukhara', 'Khiva']),
            'hotel_name' =>$this->faker->randomElement(['Jahongir', 'Komil', 'Mirza' ]),
            'checkin_date' =>$this->faker->dateTimeBetween('-1 week', '+1 week'),
            'checkout_date' =>$this->faker->dateTimeBetween('-1 week', '+1 week'),
            'tourgroup_id'=>Tourgroup::factory()


        ];
    }
}
