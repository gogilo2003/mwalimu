<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
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
        // DB::table('users')->insert([
        //     'id' => 1,
        //     'name' => 'Admin Admin',
        //     'email' => 'admin@black.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('secret'),
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        $user = new \App\Models\User();
        $user->name = 'George Ogilo';
        $user->email = 'gogilo2003@hotmail.com';
        $user->password = Hash::make('Pablo!2013');
        $user->email_verified_at = now();
        $user->save();
    }
}
