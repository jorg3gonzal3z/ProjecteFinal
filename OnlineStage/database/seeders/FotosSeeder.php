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
            ['storage/villarodona.png'],['storage/plademanlleu.jpg'],['storage/106.jpg']
        ];
        foreach($fotos as $foto){
            \App\Models\Fotos::create([
                'binari'=>$foto[0],
            ]);
        }
    }
}
