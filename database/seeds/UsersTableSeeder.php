<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 2)->create(); //Habilitar para usar el faker
        
        Role::create([
            'name'      => 'Admin',
            'slug'      => 'slug',
            'special'   => 'all-access'
        ]);
    }
}
