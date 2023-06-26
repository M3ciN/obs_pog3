<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubcategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        DB::table('subcategories')->insert([

            [
                'name' => 'Pogrzeby tradycyjne',
                'category_id' => 1,
            ],
            [
                'name' => 'Kremacje',
                'category_id' => 1,
            ],
            [
                'name' => 'Trumny',
                'category_id' => 2,
            ],
            [
                'name' => 'Urny',
                'category_id' => 2,
            ],
            [
                'name' => 'Zamówienia drukowane',
                'category_id' => 3,
            ],
            [
                'name' => 'Księgi kondolencyjne',
                'category_id' => 3,
            ],
            [
                'name' => 'Samochody pogrzebowe',
                'category_id' => 4,
            ],
            [
                'name' => 'Transport zwłok',
                'category_id' => 4,
            ],
        ]);

    }
}
