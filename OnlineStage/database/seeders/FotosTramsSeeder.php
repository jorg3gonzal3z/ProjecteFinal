<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FotosTramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotos =[
            [1,1],[2,1]
        ];
        foreach($fotos as $foto){
            \App\Models\FotosTrams::create([
                'id_fotos'=>$foto[0],
                'id_trams'=>$foto[1],
            ]);
        }
    }
}
