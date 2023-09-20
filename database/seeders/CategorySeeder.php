<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Silicon', 'description' => 'Silicon poles'],
            ['name' => 'Listrik', 'description' => 'Listrik cucian'],
            ['name' => 'Gaji', 'description' => 'Gaji Karyawan'],
            ['name' => 'Pendapatan', 'description' => 'Pedapatan harian'],
            ['name' => 'Shampo', 'description' => 'Shampo cuci'],
            ['name' => 'Peralatan', 'description' => 'Peralatan cuci'],
            // Tambahkan data lainnya sesuai kebutuhan Anda
        ];

        Category::insert($categories);
    }
}
