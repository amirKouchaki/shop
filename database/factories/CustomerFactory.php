<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CustomerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customer::class;

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
            'zip_code' =>$this->faker->postcode(),
            'telephone' =>$this->faker->phoneNumber(),
            'city' =>$this->faker->city(),
            'state' => $this->faker->streetName(),
            'street'=> $this->faker->address(),
        ];
    }
}
