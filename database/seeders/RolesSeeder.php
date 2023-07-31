<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrador',
                'description' => 'Administrador de sistema. Possui todos acessos.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'content-manager',
                'display_name' => 'Gestor de Conteúdo',
                'description' => 'Gestor de conteúdo possúi acessos todos excepto gestão de utilizadores.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'user',
                'display_name' => 'Utilizador',
                'description' => 'Utilizador possui acessos de visualização de imagens e eventos, bem como, a criação, edição e eliminação de eventos.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'guest',
                'display_name' => 'Convidado',
                'description' => 'Convidado possui permissões de visualização.',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
