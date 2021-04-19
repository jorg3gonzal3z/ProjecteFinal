<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SuperficiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superficies =[
            ['Asfalto'],
            ['Tierra'],
            ['Nieve'],
        ];
        foreach($superficies as $superficie){
            \App\Models\Superficies::create([
                'tipus'=>$superficie[0],
            ]);
        }
    }
}
