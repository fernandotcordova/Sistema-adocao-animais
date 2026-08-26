<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Animal>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this -> faker -> firstName(),
            'birth_day' => $this -> faker -> date(),
            'breed' => $this -> faker -> word(),
            'description' => $this -> faker -> text(),
            'user_id' => User::factory(),
            'image' => '5d7c9fc25d9506db34ab02f4b80ac152.jpg',
        ];
    }
}
