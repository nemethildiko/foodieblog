<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EtelSeeder extends Seeder
{
    public function run(): void
    {
        $file = base_path('database/data/etel.txt');

        if (!File::exists($file)) {
            $this->command->error("❌ Nem található a fájl: $file");
            return;
        }

        $rows = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->command->info("📄 Beolvasott sorok száma: " . count($rows));

        foreach ($rows as $row) {
            $data = str_getcsv(trim($row), ';');

            if (count($data) >= 5) {
                DB::table('etelek')->insert([
                    'nev' => $data[0],
                    'id' => (int) $data[1],
                    'kategoria_id' => (int) $data[2],
                    'felirdatum' => $data[3] ? date('Y-m-d', strtotime($data[3])) : null,
                    'elsodatum' => $data[4] ? date('Y-m-d', strtotime($data[4])) : null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
