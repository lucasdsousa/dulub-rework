<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RelatoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('relatorios')->insert([
            'nome' => 'Telemetria',
        ]);

        DB::table('relatorios')->insert([
            'nome' => 'Rotas GR',
        ]);
    }
}
