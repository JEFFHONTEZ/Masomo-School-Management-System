<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2024-2025'],
            ['type' => 'system_title', 'description' => 'MSMS'],
            ['type' => 'system_name', 'description' => 'MASOMO ACADEMY'],
            ['type' => 'term_ends', 'description' => '1/05/2024'],
            ['type' => 'term_begins', 'description' => '10/10/2024'],
            ['type' => 'phone', 'description' => '0123456789'],
            ['type' => 'address', 'description' => 'Nakuru, Kenya'],
            ['type' => 'system_email', 'description' => 'jeffkamau8501@gmail.com'],
            ['type' => 'alt_email', 'description' => ''],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ''],
            ['type' => 'next_term_fees_j', 'description' => '25000'],
            ['type' => 'next_term_fees_pn', 'description' => '28000'],
            ['type' => 'next_term_fees_p', 'description' => '24000'],
            ['type' => 'next_term_fees_n', 'description' => '25600'],
            ['type' => 'next_term_fees_s', 'description' => '20600'],
            ['type' => 'next_term_fees_c', 'description' => '2000'],
        ];

        DB::table('settings')->insert($data);

    }
}
