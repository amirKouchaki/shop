<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use function Symfony\Component\Translation\t;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2),
            'slug' => $this->faker->slug(),
            'in_stock' => $this->faker->numberBetween(0,10000),
            'currency' => $this->faker->currencyCode(),
            'avatar' =>'products/avatars/ZSJTCKcIPW07hRrBacPJRowyBs2oA1Cqjo0L4i3t.png',
            'user_id' => User::factory()
        ];
    }
}
