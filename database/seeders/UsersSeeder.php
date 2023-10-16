<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Dulub',
            'email' => 'admin@dulub.com.br',
            'setor' => 'Full_Access',
            'is_admin' => 'S',
            'approv' => 1,
            'telemetria' => 1,
            'password' => Hash::make('*dUNAX()'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Diretoria Dulub',
            'email' => 'junior.dulub@gmail.com',
            'setor' => 'Diretoria',
            'is_admin' => 'S',
            'approv' => 1,
            'telemetria' => 1,
            'password' => Hash::make('Dunax@123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Administração Dulub',
            'email' => 'mardem.dulub@gmail.com',
            'setor' => 'Administração',
            'is_admin' => 'S',
            'approv' => 1,
            'password' => Hash::make('Dunax@123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Logística Dulub',
            'email' => 'sinesio.pedro@dulub.com.br',
            'setor' => 'Logística',
            'is_admin' => 'S',
            'approv' => 1,
            'telemetria' => 1,
            'rotas_gr' => 1,
            'password' => Hash::make('Dunax@123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Gestão TI Dulub',
            'email' => 'flavio@dulub.com.br',
            'setor' => 'TI',
            'is_admin' => 'S',
            'approv' => 1,
            'password' => Hash::make('Dunax@123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'TI Dulub',
            'email' => 'ti.dulub@gmail.com',
            'setor' => 'TI',
            'is_admin' => 'S',
            'approv' => 1,
            'password' => Hash::make('Dunax@123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Desenvolvimento Dulub',
            'email' => 'paulo.albuquerque@dulub.com',
            'setor' => 'Desenvolvimento',
            'is_admin' => 'S',
            'approv' => 1,
            'telemetria' => 1,
            'password' => Hash::make('Dunax@123'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Recrutamento Dulub',
            'email' => 'recrutamento@dulub.com.br',
            'setor' => 'DP',
            'is_admin' => 'S',
            'approv' => 1,
            'password' => Hash::make('*rECRUTAMENTO()'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'Teste Dulub',
            'email' => 'lb10.bit@gmail.com',
            'setor' => 'Teste (não utilizar)',
            'is_admin' => 'S',
            'approv' => 1,
            'password' => Hash::make('*dUNAX()'),
        ]);
        
        DB::table('users')->insert([
            'name' => 'User',
            'email' => 'user@dulub.com.br',
            'setor' => 'User',
            'approv' => 1,
            'password' => Hash::make('dunax@123'),
        ]);
    }
}