<?php
namespace Database\Seeders;

use App\Models\MyClass;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->delete();
        $c = MyClass::pluck('id')->all();

        $now = now();

        $data = [
            ['name' => 'A',        'my_class_id' => 12, 'teacher_id' => 55, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'B',        'my_class_id' => 11, 'teacher_id' => 56, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gold',     'my_class_id' => 18, 'teacher_id' => 62, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Athi',     'my_class_id' => 21, 'teacher_id' => 63, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tea',      'my_class_id' => 22, 'teacher_id' => 66, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Black',    'my_class_id' => 25, 'teacher_id' => 67, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Constant', 'my_class_id' => 26, 'teacher_id' => 69, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Positive', 'my_class_id' => 28, 'teacher_id' => 15, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Down',     'my_class_id' => 31, 'teacher_id' => 3,  'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'purple',   'my_class_id' => 14, 'teacher_id' => 58, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'blue',     'my_class_id' => 14, 'teacher_id' => 59, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Asia',     'my_class_id' => 16, 'teacher_id' => 61, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Africa',   'my_class_id' => 16, 'teacher_id' => 66, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Diamond',  'my_class_id' => 18, 'teacher_id' => 60, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tana',     'my_class_id' => 21, 'teacher_id' => 65, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Coffee',   'my_class_id' => 22, 'teacher_id' => 56, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'White',    'my_class_id' => 25, 'teacher_id' => 62, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Variable', 'my_class_id' => 26, 'teacher_id' => 68, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Negative', 'my_class_id' => 28, 'teacher_id' => 67, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Up',       'my_class_id' => 31, 'teacher_id' => 67, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('sections')->insert($data);
    }
}
