<?php

use App\Ingredient;
use App\Pizza;
use Illuminate\Database\Seeder;

class PizzasIngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 30; $i++) {
            $pizza = Pizza::inRandomOrder()->first();
            $ingredient_id = Ingredient::inRandomOrder()->first()->id;
            $pizza->ingredients()->attach($ingredient_id);

        }
    }
}
