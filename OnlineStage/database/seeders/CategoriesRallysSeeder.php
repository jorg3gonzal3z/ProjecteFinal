<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesRallysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[
            [6,1],
        ];
        foreach($categories as $categoria){
            \App\Models\CategoriesRallys::create([
                'id_categories'=>$categoria[0],
                'id_rallys'=>$categoria[1],
            ]);
        }
    }
}
