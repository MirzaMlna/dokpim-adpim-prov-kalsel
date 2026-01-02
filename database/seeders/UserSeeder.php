<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                // Identitas
                'kode' => 'SA-001',
                'name' => 'MUHAMMAD MIRZA MAULANA',
                'email' => 'superadmin@dokpim.com',
                'nip' => null,
                'tanggal_lahir' => '1985-01-01',
                'jabatan' => 'PJLP',
                'foto' => null,
                'role' => 'super-admin',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
