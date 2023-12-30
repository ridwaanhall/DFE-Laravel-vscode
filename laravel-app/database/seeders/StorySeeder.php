<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // loop data 100 with faker
        for ($i = 0; $i < 100; $i++) {
            DB::table('story')->insert([
                'title' => $faker->sentence(),
                'desc' => $faker->paragraph(),
            ]);
        }

        // create data
        DB::table('story')->insert([
            'title' => 'Story 1',
            'desc' => 'Story 1 desc',
        ]);
    }
}
