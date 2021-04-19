<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FotosCotxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotos =[
            [3,1],
        ];
        foreach($fotos as $foto){
            \App\Models\FotosCotxes::create([
                'id_fotos'=>$foto[0],
                'id_cotxes'=>$foto[1],
            ]);
        }
    }
}
