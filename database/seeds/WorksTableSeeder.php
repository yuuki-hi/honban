<?php

use Illuminate\Database\Seeder;

class WorksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'title' => 'sampletitle_seeding',
            'sentence' => 'samplesentence_seeding',
            'image' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('works')->insert($param);
    }
}
