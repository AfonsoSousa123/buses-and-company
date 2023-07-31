<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            [
                'id' => 1,
                'name' => 'manage-users',
                'display_name' => 'Gestão de Utilizadores',
                'description' => 'Permite gestão de utilizadores',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'manage-events',
                'display_name' => 'Gestão de Eventos',
                'description' => 'Permite gestão de eventos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'manage-images',
                'display_name' => 'Gestão de Imagens',
                'description' => 'Permite gestão de imagens',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'view-images',
                'display_name' => 'Visualização de Imagens',
                'description' => 'Permite visualização de Imagens',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 5,
                'name' => 'view-events',
                'display_name' => 'Visualização de Eventos',
                'description' => 'Permite a Visualização de Eventos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'send-event-server',
                'display_name' => 'Envio Evento Servidor',
                'description' => 'Permite o Envio de eventos para o Servidor',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'manage-default-events',
                'display_name' => 'Gestão de Eventos Pré Definidos',
                'description' => 'Permite a gestão de eventos pré definidos',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        ]);
    }
}
