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
            ['name' => 'A',        'my_class_id' => 12, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'B',        'my_class_id' => 11, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Gold',     'my_class_id' => 18, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Athi',     'my_class_id' => 21, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tea',      'my_class_id' => 22, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Black',    'my_class_id' => 25, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Constant', 'my_class_id' => 26, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Positive', 'my_class_id' => 28, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Down',     'my_class_id' => 31, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'purple',   'my_class_id' => 14, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'blue',     'my_class_id' => 14, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Asia',     'my_class_id' => 16, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Africa',   'my_class_id' => 16, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Diamond',  'my_class_id' => 18, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tana',     'my_class_id' => 21, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Coffee',   'my_class_id' => 22, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'White',    'my_class_id' => 25, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Variable', 'my_class_id' => 26, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Negative', 'my_class_id' => 28, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Up',       'my_class_id' => 31, 'active' => 0, 'created_at' => $now, 'updated_at' => $now],
        ];

        // Get all teacher IDs
        $teacherIds = DB::table('users')->where('user_type', 'teacher')->pluck('id')->toArray();

        // Use these IDs when creating sections
        foreach ($data as $index => $section) {
            DB::table('sections')->insert([
                'name' => $section['name'],
                'my_class_id' => $section['my_class_id'],
                'teacher_id' => $teacherIds[$index % count($teacherIds)], // assign teachers in a loop
                'active' => $section['active'],
                'created_at' => $section['created_at'],
                'updated_at' => $section['updated_at'],
            ]);
        }
    }
}
