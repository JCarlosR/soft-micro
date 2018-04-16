<?php

use App\User;
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
        User::create([
            'email' => 'softmicro54@gmail.com',
            'name' => 'Admin',
            'password' => bcrypt('123123')
        ]);
    }
}
