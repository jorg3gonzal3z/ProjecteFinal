<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            ['WRC-Rally1', 380, '4WD', 1190, 2021],
            ['R5-Rally2', 290, '4WD', 1230, 2021],
            ['Rally3', 215, '4WD', 1180, 2021],
            ['R2-R2T-Rally4', 210, 'FWD', 1080, 2021],
            ['R1-Rally5', 150, 'FWD', 1080, 2021],
            ['Grupo-N', 318, 'FWD/RWD', 1350, 2012],
            ['RGT', null, 'RWD', 1200, null],
            ['Vehiculos-Historicos', null, 'FWD/RWD', null, 1996],
        ];
        foreach($categories as $categoria){
            \App\Models\Categories::create([
                'nomCategoria'=>$categoria[0],
                'potenciaMax'=>$categoria[1],
                'trenMotriu'=>$categoria[2],
                'pesMin'=>$categoria[3],
                'any'=>$categoria[4],
            ]);
        }
    }
}
