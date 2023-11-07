<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSanguineoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos_sanguineos = [
            ['descricao' => 'A+'],
            ['descricao' => 'A-'],
            ['descricao' => 'B+'],
            ['descricao' => 'B-'],
            ['descricao' => 'AB+'],
            ['descricao' => 'AB-'],
            ['descricao' => 'O+'],
            ['descricao' => 'O-'],
        ];

        DB::table('tipos_sanguineos')->insert($tipos_sanguineos);
    }
}
