<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = User::class;

    public function definition()
    {
        $name = $this->faker->unique()->name;

        return [
            'name' => $name,
            'email' => str_replace(' ', '', $name).'@example.com',
            'gender' => Arr::random(['male', 'female']),
            'age' => rand(1, 100),
        ];
    }
}
