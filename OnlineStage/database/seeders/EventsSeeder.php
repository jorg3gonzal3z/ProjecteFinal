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
            ['EuroCrew', 'storage/assets/eurocrew.jpg', 'Trackday', 200, 'Chiva, Valencia', 3],
            ["Let's & Go", "storage/assets/lets&go.jpg",'Toy Race', 30, 'El Vendrell, Tarragona', 3]
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
