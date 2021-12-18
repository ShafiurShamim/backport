<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'login' => $this->faker->unique()->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$04$7N/s9bY1s3mFZl/8ZEMpx.5KmR2ktH61sy4/Wc3TdJDI8vDzhXQgq', //testPASS
            'api_token' => bin2hex(openssl_random_pseudo_bytes(30)),
        ];
    }
}
