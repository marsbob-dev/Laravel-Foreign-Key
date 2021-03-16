<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            [
                'type' => 'Feu',
                'pokemon_id' => '',
            ],
            [
                'type' => 'Eau',
                'pokemon_id' => '',
            ],
            [
                'type' => 'Plante',
                'pokemon_id' => '',
            ],
            [
                'type' => 'Psy',
                'pokemon_id' => '',
            ],
            [
                'type' => 'Poison',
                'pokemon_id' => '',
            ],
        ]);
    }
}
