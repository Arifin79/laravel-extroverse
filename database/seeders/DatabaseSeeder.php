<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    protected static ?string $password;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        // \App\Models\Role::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'no_telp' => '082382739485',
            'image_profile' => 'http://example.com/image',
            'role_id' => 2,
            'password' => static::$password ??= Hash::make('password')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'testAdmin@example.com',
            'no_telp' => '082382739485',
            'image_profile' => 'http://example.com/image',
            'role_id' => 1,
            'password' => static::$password ??= Hash::make('password')
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'Admin'
        ]);

        \App\Models\Role::factory()->create([
            'name' => 'User'
        ]);

    }
}
