<?php

namespace Database\Seeders;

use App\Models\RoomStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RoomStatus::create([
            'name' => 'available'
        ]);

        RoomStatus::create([
            'name' => 'occupied'
        ]);

        RoomStatus::create([
            'name' => 'for house keeping'
        ]);
    }
}
