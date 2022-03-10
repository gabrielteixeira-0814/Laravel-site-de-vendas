<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = \App\Product::firstOrCreate(['name'=>'Curso de Robôtica'], ['description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a.',
         'price' => 10.50,
         'status' => 1,
         ]);
 
         $product = \App\Product::firstOrCreate(['name'=>'Curso de Inglês'], ['description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
         'price' => 50,
         'status' => 1,
         ]);

         $product = \App\Product::firstOrCreate(['name'=>'Curso de Libras'], ['description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
         'price' => 45,
         'status' => 1,
         ]);

         echo "Produtos foram criados! \n";
    }
}
