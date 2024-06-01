<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
class EntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "username" => fake()->userName(),
            "email" => fake()->email(),
            "body" => fake()->text(),
            "captcha" => fake()->word(),
            "ip" => fake()->ipv4(),
            "browser" => fake()->chrome(),
            "created_at" => fake()->dateTime(),
        ];
    }
}
