<?php

use App\Models\User;
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
        factory(User::class, 5)->create();

        User::create([
            'name' => 'Todd Austin',
            'email' => 'austin.todd.j@gmail.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name' => 'Peter McWilliams',
            'email' => 'pmcwilliams@augustash.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name' => 'Lynn Winter',
            'email' => 'lwinter@augustash.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);

        User::create([
            'name' => 'Cyle Carlson',
            'email' => 'ccarlson@augustash.com',
            'password' => bcrypt('password'),
            'remember_token' => str_random(10),
        ]);
    }
}
