<?php

namespace App\Filament\Resources\Sampahs;

use App\Filament\Resources\Sampahs\Pages\CreateSampah;
use App\Filament\Resources\Sampahs\Pages\EditSampah;
use App\Filament\Resources\Sampahs\Pages\ListSampahs;
use App\Filament\Resources\Sampahs\Schemas\SampahForm;
use App\Filament\Resources\Sampahs\Tables\SampahsTable;
use App\Models\Sampah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SampahResource extends Resource
{
    protected static ?string $model = Sampah::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $modelLabel = "Sampah";

    protected static ?string $pluralModelLabel = "Data Sampah";
    protected static ?string $navigationLabel = "Data Sampah";

    public static function form(Schema $schema): Schema
    {
        return SampahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SampahsTable::configure($table)
            ->recordUrl(null);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getLogoutRedirectUrl(): ?string
    {
        return '/admin';
    }


    public static function getPages(): array
    {
        return [
            'index' => ListSampahs::route('/'),
            'create' => CreateSampah::route('/create'),
            'edit' => EditSampah::route('/{record}/edit'),
        ];
    }
}
