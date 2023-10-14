<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class BusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('buses')->insert([
            [
                'licence_plate' => 'MD-97-07',
                'old_licence_plate' => null,
                'prod_year' => Carbon::create("1987", "06","09"),
                'model' => "",
                'fuel' => "Diesel",
                'state_id' => 1,
                'user_id' => 1,
                'company_id' => 1,
                'brand_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'licence_plate' => 'SD-93-37',
                'old_licence_plate' => null,
                'prod_year' => Carbon::create("1967", "07","02"),
                'model' => "",
                'fuel' => "Diesel",
                'state_id' => 1,
                'user_id' => 1,
                'company_id' => 3,
                'brand_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
