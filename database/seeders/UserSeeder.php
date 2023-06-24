<?php

namespace Database\Seeders;

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
        $user = new User;
        $user->name = "admin2";
        $user->email = "admin2@admin.com";
        $user->phone = "9876534231";
        $user->address = "gaur";
        $user->user_type = "1";
        $user->password = Hash::make("password");
        $user->save();

    }
}
