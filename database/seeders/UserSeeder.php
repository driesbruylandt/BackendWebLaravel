<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin
        DB::table('users')->insert([
            [
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'is_admin' => 1,
            'birthday' => '2002-03-01',
        ],[
            // Geen admin
            'name' => 'no_admin',
            'email' => 'no_admin@ehb.be',
            'password' => bcrypt('Password!321'),
            'is_admin' => 0,
            'birthday' => '2004-03-20',
        ]]);
    }
}
