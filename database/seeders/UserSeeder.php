<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Mario";
        $user->last_name = "Rossi";
        $user->email = "admin@email.it";
        $user->date_of_birth = '1990-02-03';
        $user->password = Hash::make("password");
        $user->save();
    }
}
