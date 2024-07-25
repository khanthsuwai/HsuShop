<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'voucherNo'=>$this->faker->ean8,
            'user_id'=>rand(1,10),
            'item_id'=>rand(1,10),
            'qty'=>$this->faker->randomDigit ,
            'payment_id'=>rand(1,10),
            'paymentSlip'=>$this->faker->ean8,
            'status'=>$this->faker->word
        ];
    }
}
