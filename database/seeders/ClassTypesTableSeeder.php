<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Day Care', 'code' => 'DC'],
            ['name' => 'Pre Nursery', 'code' => 'PN'],
            ['name' => 'Nursery', 'code' => 'N'],
            ['name' => 'Grade 1', 'code' => 'G1'],
            ['name' => 'Grade 2', 'code' => 'G2'],
            ['name' => 'Grade 3', 'code' => 'G3'],
            ['name' => 'Grade 4', 'code' => 'G4'],
            ['name' => 'Grade 5', 'code' => 'G5'],
            ['name' => 'Grade 6', 'code' => 'G6'],
            ['name' => 'Grade 7', 'code' => 'G7'],
            ['name' => 'Grade 8', 'code' => 'G8'],
            ['name' => 'Grade 9', 'code' => 'G9'],
        ];

        DB::table('class_types')->insert($data);

    }
}