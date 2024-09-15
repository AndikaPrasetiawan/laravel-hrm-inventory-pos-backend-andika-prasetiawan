<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create a company
        \App\Models\Company::create([
            'name' => 'AndikaTech Innovations',
            'email' => 'andika@fic20.com',
            'phone' => '08819569190',
            'website' => 'https://andikaprasetiawan.github.io/',
            'logo' => 'https://yt3.googleusercontent.com/VWaxvpCvN-ZR_DZMqcVXw-f6Qy-bxMzeIi-L3kws_-S6lj6GayYNXSaeqvTO0nLcfBJ0YYen=s160-c-k-c0x00ffffff-no-rj',
            'address' => 'Jl. Ikan Tombro 9',
            'status' => 'active',
            'total_users' => 10,
            'clock_in_time' => '09:00:00',
            'clock_out_time' => '18:00:00',
            'early_clock_in_time' => 15,
            'allow_clock_out_till' => 15,
            'self_clocking' => 1,
        ]);
    }
}
