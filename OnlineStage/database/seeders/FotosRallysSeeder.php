<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FotosRallysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotos =[
            [4,1],
        ];
        foreach($fotos as $foto){
            \App\Models\FotosRallys::create([
                'id_fotos'=>$foto[0],
                'id_rallys'=>$foto[1],
            ]);
        }
    }
}
