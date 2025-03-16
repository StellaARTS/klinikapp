<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 100; $i++) {
            Student::create ([
                'name' => $faker->name,
                'gender' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
                'email' => $faker->email,
                'phone' => '0'.$faker->numberBetween(81200000000, 82199999999),
                'grade' => 'XU.'.$faker->numberBetween(1, 11),
            ]);
        }
    }
}