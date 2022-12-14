<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
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
                'first_name' => 'Gabriel',
                'last_name' => 'Nwankwo',
                'email' => 'gabriel@gmail.com',
                'email_verified_at' => date('Y-m-d H:i:s'),
                'password' => Hash::make("12345678"),
                'role' => 2,
                'created_at' => date('Y-m-d H:i:s')
            ]
            ];

            foreach($data as $inv){
                User::updateOrCreate($inv);
            }
    }
}
