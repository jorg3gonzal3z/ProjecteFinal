<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InscritsRallysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscrits =[
            [1,1,1],
        ];
        foreach($inscrits as $inscrit){
            \App\Models\InscritsRallys::create([
                'id_rallys'=>$inscrit[0],
                'id_usuari'=>$inscrit[1],
                'id_cotxe'=>$inscrit[2],
            ]);
        }
    }
}
