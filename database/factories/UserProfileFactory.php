<?php

namespace Database\Factories;

use App\Models\UserProfile;
use Illuminate\Database\Eloquent\Factories\Factory;


class UserProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProfile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            'id' => $this->faker->word,
            'user_id' => $this->faker->randomDigitNotNull,
            'name' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'address' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'email' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'mobile' => $this->faker->numberBetween(0, 999),
            'website' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'is_company' => $this->faker->boolean,
            'logo' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'sign' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'upi_code' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'default_template_id' => $this->faker->numberBetween(0, 999),
            'enable_gst' => $this->faker->boolean,
            'gstin' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'default_bill_due_in' => $this->faker->numberBetween(0, 999),
            'default_terms' => $this->faker->word,
            'enable_shipping' => $this->faker->boolean,
            'currency_code' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'country_code' => $this->faker->text($this->faker->numberBetween(5, 4096)),
            'uuid' => $this->faker->text($this->faker->numberBetween(5, 255)),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
