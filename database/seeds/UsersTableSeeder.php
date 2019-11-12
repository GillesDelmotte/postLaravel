<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Gilles Delmotte',
            'email' => 'gilles.delmotte@outlook.be',
            'password' => Hash::make('azerty'),
            'is_admin' => 1,
            'is_author' => 1
        ]);
        User::create([
            'name' => 'Dominique Vilain',
            'email' => 'dvil@gmail.com',
            'password' => Hash::make('azerty'),
            'is_admin' => 0,
            'is_author' => 1
        ]);
    }
}
