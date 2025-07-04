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
            ['type' => 'current_session', 'description' => '2025-2026'],
            ['type' => 'system_title', 'description' => 'MSMS'],
            ['type' => 'system_name', 'description' => 'MASOMO ACADEMY'],
            ['type' => 'term_ends', 'description' => '20/10/2025'],
            ['type' => 'term_begins', 'description' => '01/01/2026'],
            ['type' => 'phone', 'description' => '0123456789'],
            ['type' => 'address', 'description' => 'Nakuru, Kenya'],
            ['type' => 'system_email', 'description' => 'jeffkamau8501@gmail.com'],
            ['type' => 'alt_email', 'description' => ''],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ''],
            // Next Term Fees (updated)
            ['type' => 'next_term_fees_lp', 'description' => '20000'],
            ['type' => 'next_term_fees_pp1', 'description' => '22000'],
            ['type' => 'next_term_fees_pp2', 'description' => '22000'],
            ['type' => 'next_term_fees_up', 'description' => '21000'],
            ['type' => 'next_term_fees_js', 'description' => '23000'],
            ['type' => 'next_term_fees_ss', 'description' => '235000'],
        ];

        DB::table('settings')->insert($data);

    }
}
