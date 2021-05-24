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
            [4,1],[9,1],[10,2],[11,2],[12,3],[13,3]
        ];
        foreach($fotos as $foto){
            \App\Models\FotosRallys::create([
                'id_fotos'=>$foto[0],
                'id_rallys'=>$foto[1],
            ]);
        }
    }
}
