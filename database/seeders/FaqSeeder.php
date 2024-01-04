<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
            'question' => 'Hoe kan ik een account aanmaken?',
            'answer' => 'Klik op de knop "Registreer" en vul het formulier in.',
            'category_id' => '1',
        ],[
            'question' => 'Mijn account is geblokkeerd, wat nu?',
            'answer' => 'Neem contact op met de admin via het contactformulier.',
            'category_id' => '2',
        ]]);
    }
}
