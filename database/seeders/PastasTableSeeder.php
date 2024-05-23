<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pasta;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pastasArray = config('pasta');

        foreach($pastasArray as $pastaItem) {
            $newPasta = new Pasta();
            $newPasta->title = $pastaItem['titolo'];
            $newPasta->description = $pastaItem['descrizione'];
            $newPasta->type = $pastaItem['tipo'];
            $newPasta->cooking_time = $pastaItem['cottura'];
            $newPasta->weight = $pastaItem['peso'];
            $newPasta->image = $pastaItem['src'];
            $newPasta->save();
        }
    }
}
