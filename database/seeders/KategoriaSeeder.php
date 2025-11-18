<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class KategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $file = base_path('database/data/kategoria.txt');

        if (!File::exists($file)) {
            $this->command->error("❌ Nem található a fájl: $file");
            return;
        }

        // Fájl sorainak beolvasása
        $rows = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $this->command->info("📄 Beolvasott sorok száma: " . count($rows));

        foreach ($rows as $row) {
            // Sor feldolgozása (pontosvesszővel elválasztva)
            $data = str_getcsv(trim($row), ';');

            // Ha legalább 2 adat van (id és név)
            if (count($data) >= 2) {
                DB::table('kategorias')->insert([
                    'nev' => $data[1], // csak a név mező!
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
