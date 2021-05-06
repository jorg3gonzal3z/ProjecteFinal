<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trams =[
            ['Les Pobles-Bonany',29,'41.360770691124465, 1.401077751783704','41.39382126193378, 1.4689125736172801','Les Pobles&&Bonany',1,1],
            ['Villarodona-Pla de Manlleu',20,'41.30944353124463, 1.3594932375402493','41.37090274487901, 1.5022054668581837','Villarodona&&Pla de Manlleu',1,1],
            ['Pla de Manlleu-San Jaume dels Domenys',12,'41.37090274487901, 1.5022054668581837','41.31098672130276, 1.557036221308087','Pla de Manlleu&&San Jaume dels Domenys',1,1],
        ];
        foreach($trams as $tram){
            \App\Models\Trams::create([
                'nom'=>$tram[0],
                'distancia'=>$tram[1],
                'sortida'=>$tram[2],
                'final'=>$tram[3],
                'adressa'=>$tram[4],
                'id_superficie'=>$tram[5],
                'id_usuari'=>$tram[6],
            ]);
        }
    }
}
