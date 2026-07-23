<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'superadmin'],
            [
                'name' => 'Super Administrator',
                'role' => 'superadmin',
                'password' => Hash::make('123'),
            ]
        );

        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin Sarpras',
                'role' => 'admin_sarpras',
                'password' => Hash::make('123'),
            ]
        );

        User::updateOrCreate(
            ['username' => 'teknisi'],
            [
                'name' => 'Teknisi Utama',
                'role' => 'teknisi',
                'password' => Hash::make('123'),
            ]
        );

        User::updateOrCreate(
            ['username' => 'guru'],
            [
                'name' => 'Guru Pengajar',
                'role' => 'guru',
                'password' => Hash::make('123'),
            ]
        );
    }
}