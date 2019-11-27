<?php

use Illuminate\Database\Seeder;
use App\Cidade;

class CidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cidade::create([
            'nome' => 'Belo Horizonte',
            'uf' => 'MG',
            'codigo_ibge' => '3106200'
        ]);

        Cidade::create([
            'nome' => 'Betim',
            'uf' => 'MG',
            'codigo_ibge' => '3106705'
        ]);

        Cidade::create([
            'nome' => 'Contagem',
            'uf' => 'MG',
            'codigo_ibge' => '3118601'
        ]);
    }
}
