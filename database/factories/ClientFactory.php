<?php

namespace Database\Factories;

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
  public function definition(): array
  {
    return [
      'name' => $this->faker->name(),
      'email' => $this->faker->unique()->safeEmail(),
      'password' => bcrypt('password'), // password
      'address' => $this->faker->address(),
      'observation' => $this->faker->sentence(),
    ];
  }
}
