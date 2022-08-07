<?php

namespace Database\Factories;

use App\Models\Persona;
use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProveedorFactory extends Factory
{
    protected $model = Proveedor::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => function()
            {
                return Persona::all()->random();
            },
            'contacto' => $this->faker->email,
            'telefono_contacto' => $this->faker->tollFreePhoneNumber
        ];
    }
}
