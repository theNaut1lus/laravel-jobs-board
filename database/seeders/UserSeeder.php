<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //For my use

        User::factory()->create([
            'first_name' => 'Sid',
            'last_name' => 'Aulakh',
            'email' => 'test@example.com',
        ]);
        User::factory(10)->create();
    }
}
