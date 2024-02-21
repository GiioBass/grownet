<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->sentence,
            'due_date' => $this->faker->dateTime,
            'status' => $this->faker->boolean,
            'user_id' => User::first()->pluck('id')->first(),
            'created_at' => $this->faker->dateTime
        ];
    }
}
