<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $status = $this->faker->randomElement(["billed", "paid", "free", "void"]);
        $billed_date = $this->faker->dateTime();
        $status === 'paid' ? $paid_date = $this->faker->dateTime($billed_date) : $paid_date = null;

        return [
            'customer_id' => Customer::factory(),
            'amount' => $this->faker->numberBetween(100, 10000),
            'status' => $status,
            'billed_date' => $billed_date,
            'paid_date' => $paid_date
        ];
    }
}
