<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            Client::CLIENT_PHONE => $this->faker->phoneNumber,
            Client::CLIENT_NAME => $this->faker->name,
            Client::CLIENT_EMAIL => $this->faker->email . '_' . rand(1000, 1000000)
        ];
    }
}
