<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        $this->createSubjects();
    }

    protected function createSubjects()
    {
        // Get all teachers
        $teachers = User::where('user_type', 'teacher')->pluck('id')->all();
        $teacherCount = count($teachers);
        $teacherIndex = 0;

        // Define subjects for each grade range
        $subjectsByGrade = [
            // Grades 1-3
            'lower' => [
                'Literacy (English)',
                'Kiswahili Language Activities',
                'Mathematical Activities',
                'Environmental Activities',
                'Hygiene and Nutrition',
                'Religious Education',
                'Christian / Islamic / Hindu Religious Activities',
                'Movement and Creative Activities',
            ],
            // Grades 4-6
            'upper' => [
                'English',
                'Kiswahili',
                'Mathematics',
                'Science and Technology',
                'Social Studies',
                'Religious Education',
                'Christian / Islamic / Hindu',
                'Home Science',
                'Creative Arts',
                'Visual Arts and Performing Arts',
                'Physical and Health Education',
                'Agriculture',
                'Life Skills Education',
                'Indigenous Languages',
                'Foreign Languages',
                'French',
                'German',
                'Mandarin',
                'Arabic',
            ],
            // Grades 7-9
            'jss' => [
                'English',
                'Kiswahili',
                'Mathematics',
                'Integrated Science',
                'Social Studies',
                'Pre-Technical and Pre-Career Education',
                'Business Studies',
                'Life Skills Education',
                'Religious Education',
                'Christian / Islamic / Hindu',
                'Sports and Physical Education',
                'Health Education',
            ],
        ];

        // Get all classes
        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {
            $gradeName = strtolower($my_class->name);

            // Determine grade range
            if (preg_match('/grade\s*([1-9])/', $gradeName, $matches)) {
                $gradeNum = (int)$matches[1];
                if ($gradeNum >= 1 && $gradeNum <= 3) {
                    $subjects = $subjectsByGrade['lower'];
                } elseif ($gradeNum >= 4 && $gradeNum <= 6) {
                    $subjects = $subjectsByGrade['upper'];
                } elseif ($gradeNum >= 7 && $gradeNum <= 9) {
                    $subjects = $subjectsByGrade['jss'];
                } else {
                    $subjects = [];
                }
            } else {
                // For non-grade classes, skip or assign no subjects
                $subjects = [];
            }

            foreach ($subjects as $subject) {
                // Assign teachers in round-robin
                $teacher_id = $teachers[$teacherIndex % $teacherCount];
                $teacherIndex++;

                DB::table('subjects')->insert([
                    'name' => $subject,
                    'slug' => \Str::slug($subject),
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id,
                ]);
            }
        }
    }
}
