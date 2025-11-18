<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HozzavaloSeeder extends Seeder
{
    public function run(): void
    {
        $file = base_path('database/data/hozzavalo.txt');

        if (!File::exists($file)) {
            $this->command->error("❌ Nem található a fájl: $file");
            return;
        }

        $rows = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->command->info("📄 Beolvasott sorok száma: " . count($rows));

        foreach ($rows as $row) {
            $data = str_getcsv(trim($row), ';');

            if (count($data) >= 2) {
                DB::table('hozzavalos')->insert([
                    'id' => $data[0],
                    'nev' => $data[1],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
