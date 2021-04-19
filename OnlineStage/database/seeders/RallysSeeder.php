<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RallysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rallys =[
            ['RACC','url/logo',40,8,3,'Catalunya/Spain',300,1,1],
        ];
        foreach($rallys as $rally){
            \App\Models\Rallys::create([
                'nom'=>$rally[0],
                'logo'=>$rally[1],
                'distancia'=>$rally[2],
                'numTC'=>$rally[3],
                'numAssistencies'=>$rally[4],
                'localitzacio'=>$rally[5],
                'numPlaces'=>$rally[6],
                'id_superficie'=>$rally[7],
                'id_usuari'=>$rally[8],
            ]);
        }
    }
}
