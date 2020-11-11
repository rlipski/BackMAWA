<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(50)->create();
        User::create([
            'name'=> 'test ja',
            'email' => 'test@gmail.com',
            'password'=>bcrypt('password'),
        ]);

    
    }
}
