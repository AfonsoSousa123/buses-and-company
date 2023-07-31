<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ActionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            [
                'id' => 1,
                'name' => 'Bus Created',
                'img' => 'fas fa-plus-square text-success',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Bus Updated',
                'img' => 'fas fa-edit text-primary',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'Bus Deleted',
                'img' => 'fas fa-trash-alt text-danger',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'Bus Restored',
                'img' => 'fas fa-trash-restore-alt text-warning',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
//            [
//                'id' => 5,
//                'name' => 'Alteração de Estado Evento',
//                'img' => 'fas fa-exclamation-triangle text-light-secondary',
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'id' => 6,
//                'name' => 'Envio de Evento para Servidor',
//                'img' => 'fas fa-paper-plane text-info',
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'id' => 7,
//                'name' => 'Alteração de Permissões da Role',
//                'img' => 'fas fa-user-lock text-primary',
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
//            [
//                'id' => 8,
//                'name' => 'Alteração da Role do Utilizador',
//                'img' => 'fas fa-user-cog text-info',
//                'created_at' => Carbon::now(),
//                'updated_at' => Carbon::now(),
//            ],
        ]);
    }
}
