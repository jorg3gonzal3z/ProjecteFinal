<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events =[
            ['RetroMóvil', 'url/logo', 'fira del automovil', 200, 'El Vendrell, Tarragona', 1],
        ];
        foreach($events as $event){
            \App\Models\Events::create([
                'nom'=>$event[0],
                'logo'=>$event[1],
                'tipus'=>$event[2],
                'numPlaces'=>$event[3],
                'localitzacio'=>$event[4],
                'id_usuari'=>$event[5],
            ]);
        }
    }
}
