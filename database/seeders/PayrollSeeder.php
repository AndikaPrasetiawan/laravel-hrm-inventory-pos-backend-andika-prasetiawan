<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payrolls = [
            [
                'company_id' => 1,
                'user_id' => 1,
                'month' => 7,
                'year' => 2024,
                'basic_salary' => 5000000,
                'salary_amount' => 6000000,
                'net_salary' => 5500000,
                'total_days' => 31,
                'working_days' => 22,
                'present_days' => 20,
                'total_office_time' => 160,
                'total_worked_time' => 150,
                'half_days' => 1,
                'late_days' => 2,
                'paid_leaves' => 2,
                'unpaid_leaves' => 1,
                'holiday_count' => 8,
                'payment_date' => Carbon::now(),
                'status' => 'generated',
            ],
            [
                'company_id' => 1,
                'user_id' => 2,
                'month' => 7,
                'year' => 2024,
                'basic_salary' => 7000000,
                'salary_amount' => 8000000,
                'net_salary' => 7500000,
                'total_days' => 31,
                'working_days' => 22,
                'present_days' => 21,
                'total_office_time' => 170,
                'total_worked_time' => 160,
                'half_days' => 0,
                'late_days' => 1,
                'paid_leaves' => 1,
                'unpaid_leaves' => 0,
                'holiday_count' => 8,
                'payment_date' => Carbon::now(),
                'status' => 'generated',
            ]
        ];
    }
}
