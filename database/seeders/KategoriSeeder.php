<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategori = ['novel', 'sejarah', 'religi', 'biografi', 'komik'];

        foreach ($kategori as  $value) {
            Kategori::create([
                'nama' => $value,
                'slug' => Str::slug($value),
            ]);
            # code...
        }
    }
}
