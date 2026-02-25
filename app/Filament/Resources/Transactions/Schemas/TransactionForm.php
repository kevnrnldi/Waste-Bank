<?php

namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Schemas\Schema;
use App\Models\Sampah;
use App\Models\Nasabah;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                //Nasabah
                Select::make('nasabah_id')
                ->relationship('nasabah', 'nama')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Nama Nasabah'),

                //Sampah
                Select::make('sampah_id')
                        ->label('Jenis Sampah')
                        ->options(Sampah::all()->pluck('nama', 'id'))
                        ->searchable()
                        ->preload()
                        ->required()
                        ->reactive() 
                        ->afterStateUpdated(function ($state, $set, $get) {
                            $sampah = Sampah::find($state);
                            if ($sampah) {
                                // Simpan harga dasar ke hidden field
                                $set('harga_per_kg', $sampah->harga_dasar);
                                // Hitung ulang duitnya
                                self::calculateTotal($set, $get);
                            }
                    }),

                TextInput::make('jumlah')
                    ->label('Jumlah atau Berat (Kg)')
                    ->numeric()
                    ->default(1)
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function ($state, $set , $get) {
                        self::calculateTotal($set, $get);
                    }),

                
                TextInput::make('harga_per_kg')
                    ->readOnly()
                    ->numeric()
                    ->prefix('Rp.')
                    ->label('Harga Per Kg')
                    ->dehydrated(false), // Jangan Masukkan ke DB

                //Hasil Perhitungan
            
                TextInput::make('gross_total')
                    ->label('Total Kotor (Omset)')
                    ->numeric()
                    ->readOnly()
                    ->prefix('Rp.'),

                TextInput::make('nasabah_income')
                    ->label('Pendapatan Nasabah')
                    ->numeric()
                    ->readOnly()
                    ->prefix('Rp.'),

                TextInput::make('bank_income')
                    ->label('Hak Bank Sampah (20%)')
                    ->numeric()
                    ->readOnly()
                    ->prefix('Rp'),

                TextInput::make('tax')
                    ->label('Pajak PBB (10%)')
                    ->numeric()
                    ->readOnly()
                    ->prefix('Rp'),
                
                DatePicker::make('transaction_date')
                    ->default(now())
                    ->required(),
            ]);
    }


    public static function calculateTotal($set,  $get) {

        $berat = floatval($get('weight') ?? 1);
        $jumlah = floatval($get('jumlah') ?? 1);
        $harga = floatval($get('harga_per_kg') ?? 0);

        // 1. Hitung Total Kotor
        $gross = $berat * $jumlah * $harga;
        
        // 2. Pecah Duitnya (Pakai floor biar gak ada koma di database)
        $nasabah = floor($gross * 0.70);
        $bank    = floor($gross * 0.20);
        $pajak   = floor($gross * 0.10);

     
        $set('gross_total', $gross);
        $set('nasabah_income', $nasabah);
        $set('bank_income', $bank);
        $set('tax', $pajak);
    }

}
