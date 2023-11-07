<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoNenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos_nens = [
            ['descricao' => 'Reforço'],
            ['descricao' => 'Emissão'],
            ['descricao' => 'Transformação'],
            ['descricao' => 'Manipulação'],
            ['descricao' => 'Materialização'],
            ['descricao' => 'Especialização'],
        ];

        DB::table('tipos_nens')->insert($tipos_nens);
    }
}
