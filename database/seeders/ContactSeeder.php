<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                // Non-admin stuurt een bericht
            'name' => 'no_admin',
            'email' => 'no_admin@ehb.be',
            'message' => 'Dit is een bericht van een non-admin',
        ]);
    }
}
