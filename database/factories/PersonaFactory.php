<?php

namespace Database\Factories;

use App\Models\Persona;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonaFactory extends Factory
{
    protected $model = Persona::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->name,
            'tipo_documento' => $this->faker->word(5),
            'num_documento' => $this->faker->randomNumber(8),
            'direccion' => $this->faker->address,
            'telefono' => $this->faker->tollFreePhoneNumber,
            'email' => $this->faker->email
        ];
    }
}
