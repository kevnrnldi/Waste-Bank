<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Nasabah;


class NasabahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dataNasabah = [
            [
                'nik' => '3201011001800001',
                'nama' => 'Budi Santoso',
                'nomor_wa' => '081234567890',
                'alamat' => 'Jl. Merpati No. 10, RT 01/02',
                'jenis_kelamin' => 'pria',
                'rt' => '001',
                'rw' => '002',
                'status' => 'aktif',
                'saldo' => 0,
            ],
            [
                'nik' => '3201015505850002',
                'nama' => 'Siti Aminah',
                'nomor_wa' => '081298765432',
                'alamat' => 'Gg. Kenanga No. 5, RT 03/05',
                'jenis_kelamin' => 'wanita',
                'rt' => '003',
                'rw' => '005',
                'status' => 'aktif',
                'saldo' => 0,
            ],
            [
                'nik' => '3201012008900003',
                'nama' => 'Agus Setiawan',
                'nomor_wa' => '081345678901',
                'alamat' => 'Perum Griya Asri Blok C2',
                'jenis_kelamin' => 'pria',
                'rt' => '005',
                'rw' => '001',
                'status' => 'aktif',
                'saldo' => 0,
            ],
            [
                'nik' => '3201016512950004',
                'nama' => 'Rina Marlina',
                'nomor_wa' => '081987654321',
                'alamat' => 'Jl. Kebon Jeruk No. 88',
                'jenis_kelamin' => 'wanita',
                'rt' => '002',
                'rw' => '003',
                'status' => 'aktif',
                'saldo' => 0,
            ],
            [
                'nik' => '3201011504880005',
                'nama' => 'Doni Pratama',
                'nomor_wa' => '085678901234',
                'alamat' => 'Kp. Durian Runtuh RT 04/04',
                'jenis_kelamin' => 'pria',
                'rt' => '004',
                'rw' => '004',
                'status' => 'non-aktif', // Satu orang non-aktif buat tes warna merah
                'saldo' => 0,
            ],
        ];

        foreach ($dataNasabah as $nasabah) {
            Nasabah::create($nasabah);
        }
    }
}
