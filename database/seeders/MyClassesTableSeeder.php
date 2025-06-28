<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();

        $ct = ClassType::pluck('id')->all(); // Get all class type IDs

        $data = [
            ['id' => 11, 'name' => 'Day care',   'class_type_id' => $ct[0] ?? 1, 'created_at' => null, 'updated_at' => null],
            ['id' => 12, 'name' => 'Baby class', 'class_type_id' => $ct[1] ?? 2, 'created_at' => null, 'updated_at' => null],
            ['id' => 14, 'name' => 'Grade 1',    'class_type_id' => $ct[3] ?? 4, 'created_at' => null, 'updated_at' => '2025-06-18 05:59:27'],
            ['id' => 16, 'name' => 'Grade 2',    'class_type_id' => $ct[3] ?? 4, 'created_at' => null, 'updated_at' => '2025-06-18 06:14:35'],
            ['id' => 18, 'name' => 'Grade 3',    'class_type_id' => $ct[3] ?? 4, 'created_at' => null, 'updated_at' => '2025-06-18 06:14:51'],
            ['id' => 21, 'name' => 'Grade 4',    'class_type_id' => $ct[3] ?? 4, 'created_at' => null, 'updated_at' => '2025-06-18 06:15:02'],
            ['id' => 22, 'name' => 'Grade 5',    'class_type_id' => $ct[3] ?? 4, 'created_at' => null, 'updated_at' => '2025-06-18 06:15:15'],
            ['id' => 25, 'name' => 'Grade 6',    'class_type_id' => $ct[3] ?? 4, 'created_at' => null, 'updated_at' => '2025-06-18 06:15:31'],
            ['id' => 26, 'name' => 'Grade 7',    'class_type_id' => $ct[4] ?? 5, 'created_at' => null, 'updated_at' => '2025-06-18 06:15:44'],
            ['id' => 28, 'name' => 'Grade 8',    'class_type_id' => $ct[4] ?? 5, 'created_at' => null, 'updated_at' => '2025-06-18 06:15:56'],
            ['id' => 31, 'name' => 'Grade 9',    'class_type_id' => $ct[4] ?? 5, 'created_at' => null, 'updated_at' => '2025-06-18 06:16:12'],
        ];

        DB::table('my_classes')->insert($data);

    }
}
