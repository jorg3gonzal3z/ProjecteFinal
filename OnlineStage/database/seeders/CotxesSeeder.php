<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CotxesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cotxes =[
            ['Pegeot 106 rallye',103,'FWD',890,1996,8,1],
        ];
        foreach($cotxes as $cotxe){
            \App\Models\Cotxes::create([
                'model'=>$cotxe[0],
                'potencia'=>$cotxe[1],
                'trenMotriu'=>$cotxe[2],
                'pes'=>$cotxe[3],
                'any'=>$cotxe[4],
                'id_categoria'=>$cotxe[5],
                'id_usuari'=>$cotxe[6],
            ]);
        }
    }
}
