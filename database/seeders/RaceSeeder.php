<?php

namespace Database\Seeders;

use App\Models\{Race, Species};
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Race::all()->each(fn($race) => $race->delete());

        $data = [
            ['name' => "Braco Francés"],
            ['name' => "Bretón Español"],
            ['name' => "Bull Terrier"],
            ['name' => "Bulldog Francés"],
            ['name' => "Bulldog Inglés"],
            ['name' => "Bullmastiff"],
            ['name' => "Caniche"],
            ['name' => "Carlino"],
            ['name' => "Chart Polski"],
            ['name' => "Chihuahua"],
            ['name' => "Chin Japonés"],
            ['name' => "Chow chow"],
            ['name' => "Cimarrón Uruguayo"],
            ['name' => "Cocker Spaniel Inglés"],
            ['name' => "Collie"],
            ['name' => "Crestado Chino"],
            ['name' => "Dálmata"],
            ['name' => "Deutsch Drahthaar"],
            ['name' => "Doberman"],
            ['name' => "Dogo Alemán"],
            ['name' => "Dogo Argentino"],
            ['name' => "Dogo de Burdeos"],
            ['name' => "Fila Brasileño"],
            ['name' => "Fox Terrier"],
            ['name' => "Foxhound Inglés"],
            ['name' => "Galgo Español"],
            ['name' => "Golden Retriever"],
            ['name' => "Gos D'Atura"],
            ['name' => "Grifón de Bohemia"],
            ['name' => "Hovawart"],
            ['name' => "Husky Siberiano"],
            ['name' => "Iceland Sheepdog"],
            ['name' => "Irish Wolfhound"],
            ['name' => "Jack Russell Terrier"],
            ['name' => "Kelpie Australiano"],
            ['name' => "Kuvasz"],
            ['name' => "Labrador Retriever"],
            ['name' => "Lebrel Afgano"],
            ['name' => "Lebrel Escocés"],
            ['name' => "Leonberger"],
            ['name' => "Lhasa Apso"],
            ['name' => "Mastín de los Pirineos"],
            ['name' => "Otterhound"],
            ['name' => "Pastor Alemán"],
            ['name' => "Pastor Belga"],
            ['name' => "Pastor Ganadero Australiano"],
            ['name' => "Pastor Garafiano"],
            ['name' => "Papillón"],
            ['name' => "Pequinés"],
            ['name' => "Pembroke Welsh Corgi"],
            ['name' => "Perro de Agua Español"],
            ['name' => "Perro de Agua Francés"],
            ['name' => "Perro sin Pelo Mexicano o Xoloitzcuintle"],
            ['name' => "Perro sin Pelo del Perú"],
            ['name' => "Petit Basset Griffon"],
            ['name' => "Pinscher"],
            ['name' => "Podenco Canario"],
            ['name' => "Podenco Ibicenco"],
            ['name' => "Pointer Inglés"],
            ['name' => "Pomerania"],
            ['name' => "Presa Canario"],
            ['name' => "Puli"],
            ['name' => "Ratón Bodeguero Andaluz"],
            ['name' => "Retriever de pelo rizado"],
            ['name' => "Rottweiler"],
            ['name' => "San Bernardo"],
            ['name' => "Samoyedo"],
            ['name' => "Schnauzer"],
            ['name' => "Scottish Terrier"],
            ['name' => "Setter Irlandés"],
            ['name' => "Shar Pei"],
            ['name' => "Shetland Sheepdog"],
            ['name' => "Shih Tzu"],
            ['name' => "Spinone italiano"],
            ['name' => "Teckel"],
            ['name' => "Terranova"],
            ['name' => "Terrier Australiano"],
            ['name' => "Terrier Checo"],
            ['name' => "Terrier Japonés"],
            ['name' => "Terrier Tibetano"],
            ['name' => "Tosa Inu"],
            ['name' => "Weimaraner"],
            ['name' => "West Highland White Terrier"],
            ['name' => "Yorkshire Terrier"],
        ];

        $species = Species::where('name', 'perro')->first();

        foreach($data as $race){
            $this->createRace($race, $species);
        }

        $data = [
            ['name' =>"Abisinio"],
            ['name' =>"American Curl"],
            ['name' =>"Angora Turco"],
            ['name' =>"Ashera"],
            ['name' =>"Azul Cubano"],
            ['name' =>"Azul Ruso"],
            ['name' =>"Balinés"],
            ['name' =>"Bengalí"],
            ['name' =>"Birmano"],
            ['name' =>"Bobtail Japonés"],
            ['name' =>"Bombay"],
            ['name' =>"Bosque de Noruega"],
            ['name' =>"British Shorthair"],
            ['name' =>"Burmés"],
            ['name' =>"Burmilla"],
            ['name' =>"Cartujo o Chartreaux"],
            ['name' =>"Común Europeo"],
            ['name' =>"Cornish Rex"],
            ['name' =>"Devon Rex"],
            ['name' =>"Exótico"],
            ['name' =>"Himalayo "],
            ['name' =>"Korat"],
            ['name' =>"Maine Coon"],
            ['name' =>"Manx"],
            ['name' =>"Mau Egipcio"],
            ['name' =>"Munchkin"],
            ['name' =>"Nebelung"],
            ['name' =>"Oriental"],
            ['name' =>"Persa"],
            ['name' =>"Persa Chinchilla"],
            ['name' =>"Persa Tabby"],
            ['name' =>"Peterbald"],
            ['name' =>"Ragamuffin"],
            ['name' =>"Ragdoll"],
            ['name' =>"Rex"],
            ['name' =>"Scottish Fold"],
            ['name' =>"Selkirk Rex"],
            ['name' =>"Siamés"],
            ['name' =>"Siberiano"],
            ['name' =>"Snowshoe"],
            ['name' =>"Somalí"],
            ['name' =>"Sphynx"],
            ['name' =>"Van Turco"],
        ];

        $species = Species::where('name', 'gato')->first();

        foreach($data as $race){
            $this->createRace($race, $species);
        }

    }

    
    private function createRace($race, $species){
        foreach($race as $row){
            Race::create([
                'species_id' => $species->id,
                'name' => $row,
            ]);
        }
    }
}
