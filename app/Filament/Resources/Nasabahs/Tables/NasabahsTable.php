<?php

namespace App\Filament\Resources\Nasabahs\Tables;

use App\Models\Nasabah;
use Filament\Actions\ActionGroup;
use Filament\Tables\Table;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Support\Enums\Alignment;
use Filament\Actions\DeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class NasabahsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                // TextColumn::make('nik')
                //     ->label('NIK')
                //     ->searchable(),

                TextColumn::make('nama')
                ->label('Nasabah')
                ->weight('bold')
                ->description(fn(Nasabah $record): string => $record->nik)    
                ->searchable(),

                TextColumn::make('nomor_wa')
                    ->label('Nomor Telepon')
                    ->icon('heroicon-m-phone')
                    ->copyable()
                    ->copymessage('Nomor telepon berhasil disalin')
                    ->searchable(),

                 TextColumn::make('alamat')
                    ->label('Domisili')
                    ->state(function (Nasabah $record): string {
                        return  $record->alamat." RT " . $record->rt . " RW " . $record->rw;

                    })
                    ->searchable(),


                TextColumn::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->color(fn (string $state): string => match ($state){
                        'pria' => 'info',   
                        'wanita' => 'success',
                    })
                    ->badge(),
               


                TextColumn::make('status')
                    ->badge()
                    ->color(fn( string $state): string => match ($state) {
                        'aktif' => 'success',
                        default => 'danger',
                    })
                    ->icon (fn (string $state): string => match ($state){
                        'aktif' => 'heroicon-m-check-circle',
                        default => 'heroicon-m-x-circle',
                    })
                    ->searchable(),

                    TextColumn::make('saldo')
                    ->numeric()
                     ->prefix('Rp. ')
                     ->suffix(',-')
                    ->sortable(),

                  

                // TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable(),
                //     // ->toggleable(isToggledHiddenByDefault: true),
                // TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable(),
                //     // ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'aktif' => 'Aktif',
                        'nonaktif' => 'Non-Aktif',
                    ]),
                SelectFilter::make('jenis_kelamin')
                    ->options([
                        'pria' => 'Pria',
                        'wanita' => 'Wanita',
                    ]),
            ])


            ->recordActions([
                ActionGroup::make([
                        EditAction::make()->label('Edit'),
                         DeleteAction::make()
                         ->label('Hapus')
                         ->modalHeading('Hapus Data Nasabah?')
                         ->modalDescription('Apakah Anda yakin ingin menghapus data nasabah ini?')
                         ->modalSubmitActionLabel('Ya, Hapus')
                         ->modalCancelActionLabel('Batal')                        
                         ->successNotificationTitle("Data berhasil dihapus"),
                ]),
                // EditAction::make()->button()->label('Edit'),
                // DeleteAction::make()->button()->label('Hapus'),
            ])

            // ->columnToggleable(false)

            ->actionsColumnLabel('Aksi')
            ->actionsAlignment('center')


            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->icon('heroicon-m-trash')
                        ->color('danger')
                        ->label('Hapus Data Terpilih')
                        ->modalHeading('Hapus Data Terpilih?')
                        ->modalDescription('Apakah Anda yakin ingin menghapus semua data yang dipilih?')
                        ->modalSubmitActionLabel('Ya, Hapus Semua')
                        ->successNotificationTitle('Data terpilih berhasil dihapus'),
                ])
                ->label('Pilih Semua')
                ->icon('heroicon-m-ellipsis-vertical'),
            ]);
    }
}
