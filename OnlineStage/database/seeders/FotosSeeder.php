<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FotosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fotos =[
            ['storage/assets/1.jpg'],
            ['storage/assets/2.JPG'],
            ['storage/assets/106.jpg'],
            ['storage/assets/rally.jpg'],
            ['storage/assets/5.jpg'],
            ['storage/assets/6.jpg'],
            ['storage/assets/7.jpeg'],
            ['storage/assets/8.jpg'],
            ['storage/assets/9.jpg'],
            ['storage/assets/10.png'],
            ['storage/assets/11.jpg'],
            ['storage/assets/12.jpeg'],
            ['storage/assets/13.jpg'],
            ['storage/assets/14.jpg'],
            ['storage/assets/15.jpg'],
        ];
        foreach($fotos as $foto){
            \App\Models\Fotos::create([
                'binari'=>$foto[0],
            ]);
        }
    }
}
