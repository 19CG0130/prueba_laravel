<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('grupos')->insert([
            ['semestre' => '2', 'grupo' => 'A', 'turno' => 'Matutino'],
            ['semestre' => '4', 'grupo' => 'B', 'turno' => 'Vespertino'],
            ['semestre' => '6', 'grupo' => 'A', 'turno' => 'Matutino'],
            ['semestre' => '8', 'grupo' => 'B', 'turno' => 'Vespertino']
        ]);
    }
}
