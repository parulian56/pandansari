<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Calon;

class CalonSeeder extends Seeder
{
    public function run(): void
    {
        Calon::create([
            'nik' => '1234567890',
            'nama_lengkap' => 'Calon Pertama',
            'visi' => 'Maju Bersama',
            'misi' => 'Meningkatkan kesejahteraan masyarakat',
            'foto' => null,
            'jumlah_suara' => 0,
        ]);
    }
}
