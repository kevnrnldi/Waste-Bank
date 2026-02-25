<?php

namespace App\Filament\Resources\Sampahs\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\ActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class SampahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->searchable(),

                TextColumn::make('kategori')
                    ->searchable(),

                TextColumn::make('satuan')
                    ->searchable(),

                
                TextColumn::make('harga_dasar')
                    ->numeric()
                    ->sortable(),
                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                    SelectFilter::make('kategori')
                    ->options([
                        'Plastik' => 'Plastik',
                        'Kertas' => 'Kertas',
                        'Logam' => 'Logam',
                        'Elektronik' => 'Elektronik',
                        "Kaca" => "Kaca",
                    ]),
                    SelectFilter::make('satuan')
                        ->options([
                            'kg' => 'kg',
                            'pcs' => 'pcs',
                        ])
                
            ])
            ->recordActions([
                ActionGroup::make([
                    EditAction::make()->label('Edit'),
                    DeleteAction::make()->label('Hapus')
                        ->label('Hapus')
                        ->modalHeading('Hapus Data Nasabah?')
                        ->modalDescription('Apakah anda yakin ingin menghapus data nasabah ini?')
                        ->modalSubmitActionLabel('Ya, Hapus')
                        ->modalCancelActionLabel('Batal')
                        ->successNotificationTitle('Data berhasil dihapus'),
                ]),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label('Hapus')
                        ->modalHeading('Hapus Data Terpilih?')
                        ->modalDescription('Apakah Anda yakin ingin menghapus semua data yang dipilih?')
                        ->modalSubmitActionLabel('Ya, Hapus Semua')
                        ->successNotificationTitle('Data terpilih berhasil dihapus'),
                ]),
            ]);
    }
}
