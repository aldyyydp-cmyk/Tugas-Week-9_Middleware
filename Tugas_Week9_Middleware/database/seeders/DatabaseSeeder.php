<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(['email' => 'admin@telkomuniversity.ac.id'], [
            'name' => 'Administrator CeLOE', 'nomor_induk' => 'ADM001',
            'password' => 'password', 'role' => 'admin',
        ]);

        User::updateOrCreate(['email' => 'dosen@telkomuniversity.ac.id'], [
            'name' => 'Dosen CeLOE', 'nomor_induk' => 'DSN001',
            'password' => 'password', 'role' => 'dosen',
        ]);

        User::updateOrCreate(['email' => 'aldydp@student.telkomuniversity.ac.id'], [
            'name' => 'Aldy Dwi Putra', 'nomor_induk' => '102042500018',
            'password' => 'password', 'role' => 'mahasiswa',
        ]);
    }
}
