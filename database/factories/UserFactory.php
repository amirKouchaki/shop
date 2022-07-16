<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            //TODO make all users slugs from asset
            'avatar' =>'users/avatars/bAjmDF5JuLmjhJRlV1P5LcJnO6BJdGlkT4ih42QL.png',
            'telephone' =>$this->faker->phoneNumber(),
            'slug' =>$this->faker->slug(),
            'email_verified_at' => now(),
            'password' => '$2y$10$Z4qBDtx0KULEZ/w7hAR6s.EUIy9W0gS6DM2kik0xJJlAbCUa8/VTS', // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
