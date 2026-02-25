<?php

namespace App\Filament\Resources\Nasabahs\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;

class NasabahForm
{
    public static function configure(Schema $schema): Schema
    {
       return $schema
        ->schema([ 
            // --- SECTION 1: DATA PRIBADI ---
            Section::make('Informasi Pribadi') // Judul Kotak
                ->description('Data identitas nasabah sesuai KTP') // Penjelasan kecil
                ->icon('heroicon-m-user') // Ikon (Pemanis)
                ->schema([ // <--- Schema milik Section ini
                    TextInput::make('nik')
                        ->label('NIK')
                        ->numeric()
                        ->maxLength(16)
                        ->unique(ignoreRecord:true)
                        ->required(),
                        
                    TextInput::make('nama')->required(),
                    
                    TextInput::make('nomor_wa')
                    ->label('Nomor Telepon')
                    ->required()
                    ->tel()
                    ->unique(ignoreRecord:true)
                    ->validationMessages ([
                        'unique' => 'Nomor telepon sudah terdaftar',
                        'required' => 'Nomor telepon harus diisi',
                        'tel' => 'Nomor telepon tidak valid',
                    ])
                    ,
                    
                    Select::make('jenis_kelamin')
                        ->options(['pria' => 'Pria', 'wanita' => 'Wanita'])
                        ->placeholder('Pilih jenis kelamin')
                        ->native(false)
                        ->required(),
                ])->columns(2), 

            // --- SECTION 2: LOKASI ---
            Section::make('Domisili')
                ->schema([
                    Textarea::make('alamat')->columnSpanFull(),
                    
                    // Kita bisa pakai Grid di dalam Section
                    TextInput::make('rt')
                    ->numeric()
                    ->label('RT'),
                    TextInput::make('rw')
                    ->numeric()
                    ->label('RW'),
                ])->columns(3),

            // --- SECTION 3: STATUS & KEUANGAN ---
            Section::make('Status Akun')
                ->schema([
                    Select::make('status')
                        ->required()
                        ->options(['aktif' => 'Aktif', 'nonaktif' => 'Nonaktif'])
                        ->placeholder('Pilih status akun')
                        ->native(false)
                        ->default('aktif'),
                        
                    TextInput::make('saldo')
                        ->prefix('Rp. ')
                        ->extraInputAttributes([
                            'class' => 'text-3xl font-bold text-green-600 text-center'
                        ])
                        ->required()
                        ->numeric()
                        ->default(0),
                ])->columns(2),
        ]);
    }
}
