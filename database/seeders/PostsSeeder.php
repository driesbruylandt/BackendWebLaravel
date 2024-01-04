<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
            'title' => 'Leuk spel gespeeld!',
            'message' => 'Deze zondag hebben we een leuk spel gespeeld!',
            'user_id' => '1',
        ],[
            'title' => 'Nieuwe update!',
            'message' => 'Er is een nieuwe update uitgekomen!',
            'user_id' => '1',
        ]]);
    }
}
