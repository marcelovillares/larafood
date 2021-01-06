<?php

use App\Models\{
    Tenant,
    User
};
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();
        
        $tenant->users()->create([
            'name' => 'Marcelo Villares',
            'email' => 'celovillares@gmail.com',
            'password' => bcrypt('321321'),
        ]);    

    }
}