<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pokemons')->insert([
            [
                'nom' => 'Salamèche',
                'image' => 'https://www.pokepedia.fr/images/2/20/Salam%C3%A8che-PDMDX.png',
                'niveau' => '15',
            ],
            [
                'nom' => 'Bulbizarre',
                'image' => 'https://www.pokepedia.fr/images/4/46/Bulbizarre-PDMDX.png',
                'niveau' => '15',
            ],
            [
                'nom' => 'Carapuce',
                'image' => 'https://www.pokepedia.fr/images/2/2d/Carapuce-PDMDX.png',
                'niveau' => '15',
            ],
        ]);
    }
}
