<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Ceremonie pogrzebowe',
            ],
            [
                'name' => 'Urządzenia pogrzebowe',
            ],
            [
                'name' => 'Druk i oprawa',
            ],
            [
                'name' => 'Transport',
            ],

        ]);
    }
}
