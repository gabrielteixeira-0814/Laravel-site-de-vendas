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
        $product = \App\Product::firstOrCreate(['name'=>'Perfect Caps'], ['description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut a.',
         'valueProduct' => 100,
         'statusSales' => 'Vendidos',
         'status' => 0,
         ]);
 
         $product = \App\Product::firstOrCreate(['name'=>'Nature Caps'], ['description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
         'valueProduct' => 250,
         'statusSales' => 'Cancelados',
         'status' => 0,
         ]);

         $product = \App\Product::firstOrCreate(['name'=>'Libid Caps'], ['description'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
         'valueProduct' => 500.50,
         'statusSales' => 'Vendidos',
         'status' => 0,
         ]);

         echo "Produtos foram criados! \n";
    }
}
