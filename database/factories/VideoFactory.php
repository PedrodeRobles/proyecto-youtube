<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'title'   => $this->faker->sentence(),
            'iframe'  => $this->faker->url(),
            'description' => $this->faker->text(500),
        ];
    }
}
