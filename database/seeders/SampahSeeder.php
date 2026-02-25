<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Sampah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SampahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kosongkan tabel dulu agar tidak duplikat saat dijalankan ulang
        DB::table('sampahs')->truncate();

        $data = [
         // --- 1. PLASTIK (Satuan: KG) --- [cite: 1]
            ['nama' => 'Botol Biru', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2300],
            ['nama' => 'Botol Putih', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 3300],
            ['nama' => 'Botol Warna', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 800],
            ['nama' => 'Botol Campur Kotor', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1500],
            ['nama' => 'Botol Campur Bersih', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2000],
            ['nama' => 'Aqua Gelas Bersih', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 4000],
            ['nama' => 'Aqua Gelas Kotor', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1500],
            ['nama' => 'Monti', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1500],
            ['nama' => 'Tutup Botol', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2000],
            ['nama' => 'Gabruk', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1500],
            ['nama' => 'Boncos', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 900],
            ['nama' => 'PP Warna', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1500],
            ['nama' => 'PP Putih', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2500],
            ['nama' => 'PP Hitam', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1200],
            ['nama' => 'HDPE Indomil', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 3200],
            ['nama' => 'HDPE Putih (Shampo/Bedak)', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2500],
            ['nama' => 'HD Cat (Wadah Cat)', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1000],
            ['nama' => 'HDPE Warna', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1500],
            ['nama' => 'Botol Oli Warna (Tanpa Tutup)', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2500],
            ['nama' => 'Botol Oli Hitam (Tanpa Tutup)', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2000],
            ['nama' => 'Botol Oli Putih (Tanpa Tutup)', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 3800],
            ['nama' => 'Impek', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 500],
            ['nama' => 'Injek', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 3200],
            ['nama' => 'Botol Milku', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 500],
            ['nama' => 'Tutup Galon', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 4700],
            ['nama' => 'Jerigen Putih', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 3200],
            ['nama' => 'Jerigen Warna', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2000],
            ['nama' => 'Crystal Bening', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 3000],
            ['nama' => 'Crystal Warna', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1000],
            ['nama' => 'Akrilik', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 1000],
            ['nama' => 'Kaset CD', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 5000],
            ['nama' => 'Nilex/Sepatu Boot', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 2000],
            ['nama' => 'Karpet Telur Utuh', 'kategori' => 'Plastik', 'satuan' => 'kg', 'harga_dasar' => 350],

            // --- 2. KERTAS (Satuan: KG) --- [cite: 2]
            ['nama' => 'Kardus', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 1300],
            ['nama' => 'HVS', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 1600],
            ['nama' => 'Buku Paket/Cetak (Tanpa Kulit)', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 1000],
            ['nama' => 'Buram (Tanpa Kulit)', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 1000],
            ['nama' => 'Koran Bagus', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 8000],
            ['nama' => 'Duplek (Buang Plastik)', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 500],
            ['nama' => 'Duplek Konis/Karpet Rusak', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 250],
            ['nama' => 'Kertas Campur (>HVS)', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 1400],
            ['nama' => 'Kertas Campur (>Warna/Duplek)', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 600],
            ['nama' => 'Kertas Campur (>Paket+Kulit)', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 700],
            ['nama' => 'Kertas Campur (>Buku Tulis+Kulit)', 'kategori' => 'Kertas', 'satuan' => 'kg', 'harga_dasar' => 1200],

            // --- 3. BESI & LOGAM (Satuan: KG) --- [cite: 3]
            ['nama' => 'Alma Kawat', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 25000],
            ['nama' => 'Alma Kaleng', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 20000],
            ['nama' => 'Alma Kuali', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 20000],
            ['nama' => 'Alma Panci', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 19000],
            ['nama' => 'Alma Siku', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 22000],
            ['nama' => 'Alma Velg Mobil', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 25000],
            ['nama' => 'Alma Mesin (Bersih)', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 20000],
            ['nama' => 'Alma Prodo', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 11000],
            ['nama' => 'Alma Campur', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 10000],
            ['nama' => 'Babet (Kepala Gas)', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 12000],
            ['nama' => 'BSP (Besi Semi Padu)', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 3200],
            ['nama' => 'Besi Padu', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 3500],
            ['nama' => 'Besi Super', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 4200],
            ['nama' => 'Kropos', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 2400],
            ['nama' => 'Seng', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 1200],
            ['nama' => 'Kaleng', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 2200],
            ['nama' => 'Filter Oli', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 900],
            ['nama' => 'Filter Sudah Dibakar', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 2400],

            // --- 4. TEMBAGA & ELEKTRONIK (Satuan: KG) --- [cite: 3]
            ['nama' => 'Tembaga', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 110000],
            ['nama' => 'Kuningan', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 70000],
            ['nama' => 'Stenlis', 'kategori' => 'Logam', 'satuan' => 'kg', 'harga_dasar' => 6800],
            ['nama' => 'CPU Utuh', 'kategori' => 'Elektronik', 'satuan' => 'kg', 'harga_dasar' => 50000],
            ['nama' => 'PCB Komputer/DVD', 'kategori' => 'Elektronik', 'satuan' => 'kg', 'harga_dasar' => 15000],
            ['nama' => 'PCB TV/Radio (Boncos)', 'kategori' => 'Elektronik', 'satuan' => 'kg', 'harga_dasar' => 2800],

            // --- 5. BARANG SATUAN (Satuan: PCS/Buah) --- [cite: 4]
            ['nama' => 'Galon (Per Buah)', 'kategori' => 'Plastik', 'satuan' => 'pcs', 'harga_dasar' => 5000],
            ['nama' => 'Aki Motor', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 10000],
            ['nama' => 'Kipas Angin Kecil', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 2000],
            ['nama' => 'Kipas Angin Besar', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 5000],
            ['nama' => 'Magicom Kecil', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 2500],
            ['nama' => 'Magicom Besar', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 5000],
            
            // Botol Kaca [cite: 4]
            ['nama' => 'Botol Kecap (Anker/Prost)', 'kategori' => 'Kaca', 'satuan' => 'pcs', 'harga_dasar' => 350],
            ['nama' => 'Sirup ABC/Jeruk Florida', 'kategori' => 'Kaca', 'satuan' => 'pcs', 'harga_dasar' => 150],
            ['nama' => 'Anggur Merah Besar', 'kategori' => 'Kaca', 'satuan' => 'pcs', 'harga_dasar' => 250],
            ['nama' => 'Bir Bintang Besar', 'kategori' => 'Kaca', 'satuan' => 'pcs', 'harga_dasar' => 500],
            ['nama' => 'Bir Bintang Kecil', 'kategori' => 'Kaca', 'satuan' => 'pcs', 'harga_dasar' => 200],
            ['nama' => 'Guiness Besar', 'kategori' => 'Kaca', 'satuan' => 'pcs', 'harga_dasar' => 400],
            ['nama' => 'Botol Atlas', 'kategori' => 'Kaca', 'satuan' => 'pcs', 'harga_dasar' => 100],
            ['nama' => 'HP Rusak', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 2500],
            ['nama' => 'Blackberry', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 5000],

            // TV & Lainnya [cite: 4]
            ['nama' => 'TV 24 Inch (Merk Bagus)', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 15000],
            ['nama' => 'TV 24 Inch (Merk Biasa)', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 10000],
            ['nama' => 'Mesin Air 1 Tabung', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 15000],
            ['nama' => 'Mesin Air 2 Tabung', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 15000],
            ['nama' => 'Box Wifi', 'kategori' => 'Elektronik', 'satuan' => 'pcs', 'harga_dasar' => 5000],
        ];

        foreach ($data as $item) {
            Sampah::create($item);
        }
    }
}
