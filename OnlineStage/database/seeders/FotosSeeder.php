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
            ['storage/villarodona.png'],['storage/plademanlleu.jpg'],['storage/106.jpg'],['storage/rally.jpg'],['storage/5.jpg'],['storage/6.jpg'],['storage/7.jpg'],['storage/8.jpg']
        ];
        foreach($fotos as $foto){
            \App\Models\Fotos::create([
                'binari'=>$foto[0],
            ]);
        }
    }
}
