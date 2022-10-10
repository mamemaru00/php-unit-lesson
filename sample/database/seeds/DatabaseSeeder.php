<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Todo;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(User::class, 5)->create();
        factory(Todo::class, 5)->create();
    }
}
