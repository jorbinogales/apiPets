<?php

namespace Database\Seeders;

use App\Models\{Species, Race};
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $this->call(SpeciesSeeder::class);
        $this->call(RaceSeeder::class);
    }
}
