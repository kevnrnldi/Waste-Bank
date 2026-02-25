<?php

namespace App\Filament\Resources\Transactions\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nasabah.nama')
                    ->label('Nasabah')
                    ->weight('bold')
                    ->description(fn($record): string => $record->nasabah->nik)
                    ->searchable(),

                TextColumn::make('nasabah.nomor_wa')
                    ->label('Nomor Telepon')
                    ->icon('heroicon-m-phone')
                    ->copyable()
                    ->copymessage('Nomor telepon berhasil disalin')
                    ->searchable(),

                TextColumn::make('sampah.nama')
                    ->label('Jenis Sampah')
                    ->searchable(),

                TextColumn::make('gross_total')
                    ->numeric()
                    ->label('Omset')
                    ->prefix('Rp. ')
                    ->suffix(',-')
                    ->sortable(),


                TextColumn::make('nasabah_income')
                    ->numeric()
                    ->label('Pendapatan Nasabah')
                    ->prefix('Rp. ')
                    ->suffix(',-')
                    ->sortable(),

                TextColumn::make('bank_income')
                    ->numeric()
                    ->label('Pendapatan Bank Sampah')
                    ->prefix('Rp. ')
                    ->suffix(',-')
                    ->sortable(),

                TextColumn::make('tax')
                    ->numeric()
                    ->label('Pajak')
                    ->prefix('Rp. ')
                    ->suffix(',-')
                    ->sortable(),

                
                TextColumn::make('transaction_date')
                    ->label('Tanggal Transaksi')
                    ->dateTime()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
