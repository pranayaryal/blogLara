<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StatusesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'archived',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('statuses')->insert([
            'name' => 'draft',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('statuses')->insert([
            'name' => 'published',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
