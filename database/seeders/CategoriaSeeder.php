<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categorias')->insert([
            'nomeCategoria' => 'Veículos Leves',
            'imagem' => 'images/Categoria 01.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Veículos Pesados',
            'imagem' => 'images/Categoria 02.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Motocicletas',
            'imagem' => 'images/Categoria 03.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Agrícolas',
            'imagem' => 'images/Categoria 04.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Transmissões',
            //'imagem' => 'images/Categoria 04.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Engrenagens',
            //'imagem' => 'images/Categoria 04.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Industriais',
            //'imagem' => 'images/Categoria 04.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Graxas',
            //'imagem' => 'images/Categoria 04.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Arla 32',
            //'imagem' => 'images/Categoria 04.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Fluidos de Freios',
            //'imagem' => 'images/Categoria 04.png',
        ]);

        DB::table('categorias')->insert([
            'nomeCategoria' => 'Super Aditivos',
            //'imagem' => 'images/Categoria 04.png',
        ]);
    }
}
