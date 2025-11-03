<?php

namespace Database\Seeders;

use App\Models\Gelombang;
use Illuminate\Database\Seeder;

class GelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gelombangs = [
            [
                'tapel' => '2024/2025',
                'judul' => 'Gelombang 1',
                'is_active' => 'ya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tapel' => '2024/2025',
                'judul' => 'Gelombang 2',
                'is_active' => 'tidak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tapel' => '2023/2024',
                'judul' => 'Gelombang 1',
                'is_active' => 'tidak',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($gelombangs as $gelombang) {
            Gelombang::create($gelombang);
        }
    }
}
