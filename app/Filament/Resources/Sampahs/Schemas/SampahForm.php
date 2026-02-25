<?php

namespace App\Filament\Resources\Sampahs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SampahForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('kategori')
                    ->required(),
                TextInput::make('satuan')
                    ->required()
                    ->default('kg'),
                TextInput::make('harga_dasar')
                    ->required()
                    ->numeric(),
            ]);
    }
}
