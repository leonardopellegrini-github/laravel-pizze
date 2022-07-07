<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Pizza;

class PizzasTableSeeder extends Seeder
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
            $new_pizza->slug = str::slug( $pizza['nome'], '-');
            $new_pizza->nome = $pizza['nome'];
            $new_pizza->prezzo = $pizza['prezzo'];
            $new_pizza->ingredienti = $pizza['ingredienti'];
            $new_pizza->vegetariana = $pizza['vegetariana'];
            $new_pizza -> save();
        }
    }
}
