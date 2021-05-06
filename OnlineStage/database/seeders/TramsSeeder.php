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
            ['Les Pobles-Bonany',12,'Les Pobles','Bonany','Les Pobles->Bonany',1,1],
            ['Villarodona-Pla de Manlleu',20,'Villarodona','Pla de Manlleu','Villarodona->Pla de Manlleu',1,1],
            ['Pla de Manlleu-San Jaume dels Domenys',12,'Pla de Manlleu','San Jaume dels Domenys','Pla de Manlleu->San Jaume dels Domenys',1,1],
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
