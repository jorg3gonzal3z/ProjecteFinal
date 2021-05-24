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
            [6,1],[2,1],[6,2],[7,2],[8,2],[6,3],[7,3],[8,3],
        ];
        foreach($categories as $categoria){
            \App\Models\CategoriesRallys::create([
                'id_categories'=>$categoria[0],
                'id_rallys'=>$categoria[1],
            ]);
        }
    }
}
