<?php

namespace Database\Seeders;

use App\Models\Articulo;
use App\Models\Categoria;
use App\Models\Persona;
use App\Models\Proveedor;
use App\Models\Rol;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Categoria::factory(10)->create();
        Articulo::factory(30)->create();
        Persona::factory(20)->create();
        User::factory(10)->create();
        Proveedor::factory(5)->create();
    }
}
