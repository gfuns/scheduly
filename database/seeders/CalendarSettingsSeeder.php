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
                'day_full' => 'SUNDAY',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 0,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'MON',
                'day_full' => 'MONDAY',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'TUE',
                'day_full' => 'TUESDAY',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'WED',
                'day_full' => 'WEDNESDAY',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'THU',
                'day_full' => 'THURSDAY',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'FRI',
                'day_full' => 'FRIDAY',
                'start_time' => '10:00:00',
                'stop_time' => '16:00:00',
                'status' => 1,
                'created_at' => date('Y-m-d H:i:s')
            ],
            [
                'week_day' => 'SAT',
                'day_full' => 'SATURDAY',
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
