<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'design'
        ]);

        DB::table('categories')->insert([
            'name' => 'development'
        ]);

        DB::table('categories')->insert([
            'name' => 'process'
        ]);

        DB::table('categories')->insert([
            'name' => 'random'
        ]);
    }
}
