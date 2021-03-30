<?php

use Illuminate\Database\Seeder;

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
        $user = User::where('email','afridi@gmail.com')->first();

       if(is_null($user)){
       	$user = new User();
       	$user->name = "Ahmed Sagor";
       	$user->email = "afridi@gmail.com";
       	$user->password = Hash::make('12345678');
       	$user->save();
       }
    
    }
}
