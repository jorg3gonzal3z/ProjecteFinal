<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class InscritsEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inscrits =[
            [1,1],
        ];
        foreach($inscrits as $inscrit){
            \App\Models\InscritsEvents::create([
                'id_events'=>$inscrit[0],
                'id_usuari'=>$inscrit[1],
            ]);
        }
    }
}
