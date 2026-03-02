<?php

namespace App\Filament\Resources\Transactions\Schemas;

use App\Models\Sampah;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([

                // Informasi Transaksi
                Section::make('Informasi Transaksi')
                    ->schema([
                        Select::make('nasabah_id')
                            ->relationship('nasabah', 'nama')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Nama Nasabah'),

                        DatePicker::make('transaction_date')
                            ->required()
                            ->default(now())
                            ->label('Tanggal Transaksi'),
                    ])->columns(2),
           


                // Keranjang Sampah    
                Section::make('Keranjang Sampah')
                    ->schema([
                        Repeater::make('details')
                            ->relationship()
                            ->schema([
                                Select::make('sampah_id')
                                    ->options(Sampah::all()->pluck('nama', 'id'))
                                    ->required()
                                    ->searchable()
                                    ->live()
                                    ->afterStateUpdated(function ($state, $set, $get) {
                                        $sampah = Sampah::find($state);
                                        if($sampah) {
                                            $set('harga_per_kg', $sampah->harga_dasar);
                                            self::hitungSubtotal($set, $get);
                                        }
                                    })
                                    ->label('Jenis Sampah'),


                                TextInput::make('harga_per_kg')
                                    ->label('Harga (Rp)')
                                    ->numeric()
                                    ->readOnly(),

                                TextInput::make('jumlah')
                                    ->label('Jumlah (Pcs/Karung)')
                                    ->numeric()
                                    ->default(1)
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, $set, $get) => self::hitungSubtotal($set, $get)),

                                TextInput::make('berat')
                                    ->label('Berat (Kg)')
                                    ->numeric()
                                    ->default(1)
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, $set, $get) => self::hitungSubtotal($set, $get)),

                                TextInput::make('subtotal')
                                    ->label('Subtotal (Rp)')
                                    ->numeric()
                                    ->readOnly(),
                            ])
                            ->columns(5)
                            ->live()
                            ->afterStateUpdated(function ($state, $set){
                                self::hitungGrandTotal($state, $set);
                            })
                    ]),

                    // Hasil Potongan
                        Section::make('Rincian Pembagian (70 - 20 - 10)')
                    ->schema([
                        TextInput::make('grand_total_kotor')
                            ->label('Grand Total Kotor')
                            ->numeric()
                            ->readOnly()
                            ->prefix('Rp'),

                        TextInput::make('grand_total_nasabah')
                            ->label('Hak Nasabah (70%)')
                            ->numeric()
                            ->readOnly()
                            ->prefix('Rp'),

                        TextInput::make('grand_total_bank')
                            ->label('Hak Bank Sampah (20%)')
                            ->numeric()
                            ->readOnly()
                            ->prefix('Rp'),

                        TextInput::make('grand_total_pajak')
                            ->label('Pajak PBB (10%)')
                            ->numeric()
                            ->readOnly()
                            ->prefix('Rp'),
                    ])->columns(4),
                    ]);    
    }
public static function hitungSubtotal($set, $get) 
{        
        $harga = floatval($get('harga_per_kg') ?? 0);
        $jumlah = intval($get('jumlah') ?? 1);
        $berat = floatval($get('weight') ?? 1);

        $subtotal = $harga * $jumlah * $berat;
        $set('subtotal', $subtotal);

        // 2. Intip isi seluruh keranjang (Naik 2 lantai pakai ../../)
        $semuaBarang = $get('../../details');
        $grandTotal = 0;

        if(is_array($semuaBarang)) {
            foreach ($semuaBarang as $item) {
                $grandTotal += floatval($item['subtotal'] ?? 0);
            }
        }

        $set('../../grand_total_kotor', $grandTotal);
        $set('../../grand_total_nasabah', floor($grandTotal * 0.70));
        $set('../../grand_total_bank', floor($grandTotal * 0.20));
        $set('../../grand_total_pajak', floor($grandTotal * 0.10));
}

public static function hitungGrandTotal($state, $set)
{
    $grandTotal = 0;

    if(is_array($state)) {
        foreach ($state as $item) {
            $grandTotal += floatval($item['subtotal'] ?? 0);
        }
    }

        $nasabah = floor($grandTotal * 0.70);
        $bank    = floor($grandTotal * 0.20);
        $pajak   = floor($grandTotal * 0.10);

        $set('grand_total_kotor', $grandTotal);
        $set('grand_total_nasabah', $nasabah);
        $set('grand_total_bank', $bank);
        $set('grand_total_pajak', $pajak);
    }
}
