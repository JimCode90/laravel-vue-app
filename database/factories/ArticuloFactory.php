<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticuloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'idcategoria' => function () {
                return Categoria::all()->random();
            },
            'codigo' => $this->faker->word,
            'nombre' => $this->faker->sentence(1),
            'precio_venta' => $this->faker->randomNumber(2),
            'stock' => $this->faker->randomDigit             ,
            'descripcion' => $this->faker->sentence(2),
            'condicion' => true
        ];
    }
}
