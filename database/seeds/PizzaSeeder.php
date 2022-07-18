<?php

use Illuminate\Database\Seeder;
use App\Pizza;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizze = config('pizze');
            foreach($pizze as $pizza){
                $new_pizza = new Pizza();
                $new_pizza->fill($pizza);
                $new_pizza->slug = Pizza::slugGenerator($new_pizza->name);
                $new_pizza->save();
            }
    }
}
