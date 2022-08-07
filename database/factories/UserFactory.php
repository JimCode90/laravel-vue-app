<?php

namespace Database\Factories;

use App\Models\Persona;
use App\Models\Rol;
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
            'id' => function () {
                return Persona::all()->random();
            },
            'usuario' => $this->faker->userName,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'condicion' => true,
            'idrol' => function () {
                return Rol::all()->random();
            }
        ];
    }
}
