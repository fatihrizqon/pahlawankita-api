<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Hero::factory(191)->create();
    }
}
