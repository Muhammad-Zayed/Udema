<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    public function run()
    {

        factory(App\User::class)->states('admin')->create();
        factory(App\User::class, 50)->create();
    }
}
