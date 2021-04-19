<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            SuperficiesSeeder::class,
            FotosSeeder::class,
            CategoriesSeeder::class,
            EventsSeeder::class,
            RallysSeeder::class,
            TramsSeeder::class,
            CotxesSeeder::class,
            InscritsEventsSeeder::class,
            InscritsRallysSeeder::class,
            FotosRallysSeeder::class,
            FotosCotxesSeeder::class,
            FotosTramsSeeder::class,
            CategoriesRallysSeeder::class,
        ]);
    }
}
