<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriveSeeder extends Seeder
{
    /**
     * Seed the drives table with 20 placement drives.
     */
    public function run(): void
    {
        /** @var array<int, array{company: string, role: string, package_lpa: float, min_cgpa: float, days_until_last_date: int}> $drives */
        $drives = [
            [
                'company' => 'Infosys',
                'role' => 'Systems Engineer',
                'package_lpa' => 3.6,
                'min_cgpa' => 6.0,
                'days_until_last_date' => 7,
            ],
            [
                'company' => 'TCS',
                'role' => 'Digital Developer',
                'package_lpa' => 7.0,
                'min_cgpa' => 7.0,
                'days_until_last_date' => 10,
            ],
            [
                'company' => 'Zoho',
                'role' => 'Software Developer',
                'package_lpa' => 8.4,
                'min_cgpa' => 7.5,
                'days_until_last_date' => 12,
            ],
            [
                'company' => 'Accenture',
                'role' => 'Associate Software Engineer',
                'package_lpa' => 4.5,
                'min_cgpa' => 6.5,
                'days_until_last_date' => 14,
            ],
            [
                'company' => 'Wipro',
                'role' => 'Project Engineer',
                'package_lpa' => 3.5,
                'min_cgpa' => 6.0,
                'days_until_last_date' => 5,
            ],
            [
                'company' => 'HCLTech',
                'role' => 'Graduate Engineer Trainee',
                'package_lpa' => 4.25,
                'min_cgpa' => 6.5,
                'days_until_last_date' => 9,
            ],
            [
                'company' => 'Tech Mahindra',
                'role' => 'Associate Software Engineer',
                'package_lpa' => 3.25,
                'min_cgpa' => 6.0,
                'days_until_last_date' => 11,
            ],
            [
                'company' => 'Cognizant',
                'role' => 'Programmer Analyst Trainee',
                'package_lpa' => 4.0,
                'min_cgpa' => 6.0,
                'days_until_last_date' => 15,
            ],
            [
                'company' => 'Capgemini',
                'role' => 'Analyst',
                'package_lpa' => 4.25,
                'min_cgpa' => 6.0,
                'days_until_last_date' => 18,
            ],
            [
                'company' => 'LTIMindtree',
                'role' => 'Graduate Engineer Trainee',
                'package_lpa' => 4.05,
                'min_cgpa' => 6.5,
                'days_until_last_date' => 20,
            ],
            [
                'company' => 'Persistent Systems',
                'role' => 'Software Engineer',
                'package_lpa' => 6.5,
                'min_cgpa' => 7.0,
                'days_until_last_date' => 13,
            ],
            [
                'company' => 'Deloitte',
                'role' => 'Analyst',
                'package_lpa' => 7.6,
                'min_cgpa' => 7.0,
                'days_until_last_date' => 16,
            ],
            [
                'company' => 'Amazon',
                'role' => 'SDE I',
                'package_lpa' => 32.0,
                'min_cgpa' => 8.0,
                'days_until_last_date' => 6,
            ],
            [
                'company' => 'Microsoft',
                'role' => 'Software Engineer',
                'package_lpa' => 45.0,
                'min_cgpa' => 8.5,
                'days_until_last_date' => 8,
            ],
            [
                'company' => 'Google',
                'role' => 'Software Engineer',
                'package_lpa' => 50.0,
                'min_cgpa' => 8.5,
                'days_until_last_date' => 21,
            ],
            [
                'company' => 'Atlassian',
                'role' => 'Graduate Software Engineer',
                'package_lpa' => 48.0,
                'min_cgpa' => 8.0,
                'days_until_last_date' => 19,
            ],
            [
                'company' => 'Flipkart',
                'role' => 'SDE I',
                'package_lpa' => 28.0,
                'min_cgpa' => 7.5,
                'days_until_last_date' => 17,
            ],
            [
                'company' => 'Razorpay',
                'role' => 'Backend Engineer',
                'package_lpa' => 22.0,
                'min_cgpa' => 7.5,
                'days_until_last_date' => 24,
            ],
            [
                'company' => 'Freshworks',
                'role' => 'Software Engineer',
                'package_lpa' => 12.0,
                'min_cgpa' => 7.0,
                'days_until_last_date' => 22,
            ],
            [
                'company' => 'Paytm',
                'role' => 'Software Engineer',
                'package_lpa' => 16.0,
                'min_cgpa' => 7.0,
                'days_until_last_date' => 25,
            ],
        ];

        $now = now();

        DB::table('drives')->insert(array_map(fn (array $drive): array => [
            'company' => $drive['company'],
            'role' => $drive['role'],
            'package_lpa' => $drive['package_lpa'],
            'min_cgpa' => $drive['min_cgpa'],
            'last_date' => $now->copy()->addDays($drive['days_until_last_date'])->toDateString(),
            'created_at' => $now,
            'updated_at' => $now,
        ], $drives));
    }
}
