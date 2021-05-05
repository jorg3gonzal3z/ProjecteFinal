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
            ['RACC',40,8,3,'Catalunya/Spain',300,1,1],
        ];
        foreach($rallys as $rally){
            \App\Models\Rallys::create([
                'nom'=>$rally[0],
                'distancia'=>$rally[1],
                'numTC'=>$rally[2],
                'numAssistencies'=>$rally[3],
                'localitzacio'=>$rally[4],
                'numPlaces'=>$rally[5],
                'id_superficie'=>$rally[6],
                'id_usuari'=>$rally[7],
            ]);
        }
    }
}
