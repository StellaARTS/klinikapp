<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       // $data = [
        //    'name' => 'Test User',
        //   'email' => 'test@example.com',
        //    'password' => bcrypt('test')

        $data = [
            ['name' => 'mm',
            'email' => 'test@example.com',
            'password' => bcrypt('test'),

        ]


    ];
        \App\Models\User::insert($data);
    
        $this->call(PasienSeeder::class);
        $this->call(PoliSeeder::class);
        $this->call(DaftarSeeder::class);

    }
}

        