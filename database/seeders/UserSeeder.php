<?php

namespace Database\Seeders;

use App\Models\User;
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
        $user = new User();
        $user->name = 'George Ogilo';
        $user->email = 'gogilo2003@hotmail.com';
        $user->password = bcrypt('Pablo!2013');
        $user->email_verified_at = now();
        $user->save();
    }
}
