<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        Species::all()->each(fn($species) => $species->delete());

        $data = [
            ['name' => 'perro'],
            ['name' => 'gato'],
        ];


        foreach($data as $species){
        
            $this->createSpecies($species);

        }

    }

    private function createSpecies($species){

        foreach($species as $row){
            Species::create(['name' => $row]);
        }

    }
}
