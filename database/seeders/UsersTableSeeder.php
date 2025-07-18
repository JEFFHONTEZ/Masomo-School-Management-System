<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $this->createNewUsers();
        $this->createManyUsers( 3);
    }

    protected function createNewUsers()
    {
        $password = Hash::make('123456789'); // Default user password

        $d = [

            ['name' => 'Jeff Kamau',
                'email' => 'jeff@super.com',
                'username' => 'jeff',
                'password' => $password,
                'user_type' => 'super_admin',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Admin Jeff',
            'email' => 'jeff@admin.com',
            'password' => $password,
            'user_type' => 'admin',
            'username' => 'admin_jeff',
            'code' => strtoupper(Str::random(10)),
            'remember_token' => Str::random(10),
            ],

            ['name' => 'Teacher Jeff',
                'email' => 'jeff@teacher.com',
                'user_type' => 'teacher',
                'username' => 'teacher_karanja',
                'password' => $password,
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Parent Jeff',
                'email' => 'jeff@parent.com',
                'user_type' => 'parent',
                'username' => 'parent_one',
                'password' => $password,
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Accountant Jeff',
                'email' => 'jeff@accountant.com',
                'user_type' => 'accountant',
                'username' => 'accountant_jeff',
                'password' => $password,
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],
        ];
        DB::table('users')->insert($d);
    }

    protected function createManyUsers(int $count)
    {
        $data = [];
        // Remove 'super_admin' and 'librarian' from the list below
        $user_type = Qs::getAllUserTypes(['student', 'parent', 'teacher', 'admin', 'accountant']);

        for($i = 1; $i <= $count; $i++){
            foreach ($user_type as $k => $ut){
                $data[] = [
                    'name' => ucfirst($user_type[$k]).' '.$i,
                    'email' => $user_type[$k].$i.'@example.com', // Make email unique per user
                    'user_type' => $user_type[$k],
                    'username' => $user_type[$k].$i,
                    'password' => Hash::make($user_type[$k]),
                    'code' => strtoupper(Str::random(10)),
                    'remember_token' => Str::random(10),
                ];
            }
        }

        DB::table('users')->insert($data);
    }
}
