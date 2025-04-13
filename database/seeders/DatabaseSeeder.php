<?php

namespace Database\Seeders;

use App\Models\{User,Clinic};
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

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@myclinicdz.com',
            'password' => bcrypt('password'),
            'user_type'=>"admin"
        ]);
        
                Clinic::create([
                    "name"=>"Clinique Chiffa",
                    "active_until"=>today()->modify("+1 year")
                ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'doctor@myclinicdz.com',
            'password' => bcrypt('password'),
            'user_type'=>"doctor",
            'clinic_id'=>1
        ]);
    }
}
