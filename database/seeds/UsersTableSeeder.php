<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('Users')->delete();
        User::create(array(
        		'name' => 'developer',
        		'email' => 'dev@gmail.com',
        		'password' => Hash::make('dev321')

        ));
    }
}
