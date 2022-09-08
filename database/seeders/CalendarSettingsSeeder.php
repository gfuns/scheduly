<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CalendarSettings;
class CalendarSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'week_day' => 'SUN',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'MON',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'TUE',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'WED',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'THU',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'FRI',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'SAT',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ]
            ];

            foreach($data as $inv){
                CalendarSettings::updateOrCreate($inv);
            }
    }
}
