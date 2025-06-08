<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Kasir;
use Illuminate\Support\Facades\Hash;

class KasirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Kasir::updateOrCreate(
            ['name' => 'adamkasir'],            // kolom unik
            [
                'password' => Hash::make('password123'),
                // tambahkan field lain jika ada (mis. phone, role, dll.)
            ]
        );
    }
}
