<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria; 

class CategoriaSeeder extends Seeder
{
    public function run()
    {
        Categoria::create([
            'nombre' => 'Electrónica',
        ]);

        Categoria::create([
            'nombre' => 'Ropa',
        ]);

        Categoria::create([
            'nombre' => 'Alimentos',
        ]);

        Categoria::create([
            'nombre' => 'Hogar',
        ]);

        Categoria::create([
            'nombre' => 'Deportes',
        ]);
    }
}
