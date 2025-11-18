<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class HasznaltSeeder extends Seeder
{
    public function run(): void
    {
        $file = base_path('database/data/hasznalt.txt');

        if (!File::exists($file)) {
            $this->command->error("❌ Nem található a fájl: $file");
            return;
        }

        $rows = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $this->command->info("📄 Beolvasott sorok száma: " . count($rows));

        foreach ($rows as $row) {
            $data = str_getcsv(trim($row), ';');

            // Legalább 4 adat kell (mennyiség, egyseg, etel_id, hozzavalo_id)
            if (count($data) >= 4) {
                $mennyisegRaw = trim($data[0]);
                $mennyiseg = $mennyisegRaw !== '' ? floatval(str_replace(',', '.', $mennyisegRaw)) : null;

                try {
                    DB::table('hasznalts')->insert([
                        'etel_id' => (int) $data[2],
                        'hozzavalo_id' => (int) $data[3],
                        'mennyiseg' => $mennyiseg,
                        'egyseg' => $data[1] ?: null,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                } catch (\Exception $e) {
                    $this->command->warn("⚠️ Hiba a sor beszúrásakor: {$row}");
                }
            } else {
                $this->command->warn("⚠️ Hiányos adat: {$row}");
            }
        }
    }
}
