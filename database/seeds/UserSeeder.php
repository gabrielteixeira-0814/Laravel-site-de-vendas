<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Criando usuários

         $admin = \App\User::firstOrCreate(['email'=>'gabriel@gmail.com'], ['name'=>'Gabriel',
         'cpf' =>'90118635000',
         'password'=>Hash::make('123456')
         ]);
 
         $admin = \App\User::firstOrCreate(['email'=>'daniela@gmail.com'], ['name'=>'Daniela',
            'cpf' =>'14586764040',
            'password'=>Hash::make('123456')
         ]);
 
         echo "Usuários criados! \n";
    }
}
