<?php

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
        $this->call(UserTableSeeder::class);
        $this->call(ArticlesTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(CommnetsTableSeeder::class);
    }
}
