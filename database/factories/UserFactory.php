<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Hash::make('test'),
            'created_at' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
        ];
    }

    // public function man()
    // {
    //     return $this->state(function (array $attributes) {
    //         return [
    //             'gender' => 'main',
    //         ];
    //     });
    // }
}
