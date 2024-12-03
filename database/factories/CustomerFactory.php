<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;


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
            'id' => $this->faker->word,
            'name' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'address' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'pincode' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'city' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'state' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'country' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'mobile' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'email' => $this->faker->email,
            'uuid' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
