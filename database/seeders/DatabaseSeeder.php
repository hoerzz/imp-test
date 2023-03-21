<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        User::create([
            'username' => 'udin',
            'fullname' => 'chaerudin',
            'email' => 'chaerudin.dev@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::create([
            'username' => 'ilham',
            'fullname' => 'Ilham Cahyadi',
            'email' => 'ilham.dev@gmail.com',
            'password' => bcrypt('password')
        ]);
        // User::factory(3)->create();
    }
}