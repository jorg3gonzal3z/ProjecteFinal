<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =[
            ['Jorge','jorgegzgc@gmail.com','$2y$10$d5SX5jsG3uSYfvKkhHieQ.7vhd60EC3AMiXZu9ev7kLotao1k6hkq','admin'],
            ['Juli','juli@gmail.com','$2y$10$d5SX5jsG3uSYfvKkhHieQ.7vhd60EC3AMiXZu9ev7kLotao1k6hkq','admin'],
            ['Aleix','aleix@gmail.com','$2y$10$d5SX5jsG3uSYfvKkhHieQ.7vhd60EC3AMiXZu9ev7kLotao1k6hkq', null]
        ];
        foreach($users as $user){
            \App\Models\User::create([
                'name'=>$user[0],
                'email'=>$user[1],
                'password'=>$user[2],
                'rol'=>$user[3],
            ]);
        }
    }
}
