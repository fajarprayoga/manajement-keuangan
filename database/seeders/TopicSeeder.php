<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Topic;
class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $topics = [
            ['name' => 'Putra Fajar Cuci Mobil', 'address' => 'Jalan Mengwi Baha', 'contact' => 'No Hp 082145931513', 'image' => null],
            // Tambahkan data lainnya sesuai kebutuhan Anda
        ];

        Topic::insert($topics);
    }
}
