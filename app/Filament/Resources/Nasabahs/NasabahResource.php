<?php

namespace App\Filament\Resources\Nasabahs;

use App\Filament\Resources\Nasabahs\Pages\CreateNasabah;
use App\Filament\Resources\Nasabahs\Pages\EditNasabah;
use App\Filament\Resources\Nasabahs\Pages\ListNasabahs;
use App\Filament\Resources\Nasabahs\Schemas\NasabahForm;
use App\Filament\Resources\Nasabahs\Tables\NasabahsTable;
use App\Models\Nasabah;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;

class NasabahResource extends Resource
{
    protected static ?string $model = Nasabah::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-user';
    protected static ?string $recordTitleAttribute = 'nama';

    protected static ?string $modelLabel = "Nasabah";

    protected static ?string $pluralModelLabel = "Data Nasabah";
    protected static ?string $navigationLabel = "Data Nasabah";



    public static function form(Schema $schema): Schema
    {
        return NasabahForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return NasabahsTable::configure($table)
            ->recordUrl(null);
        }   

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListNasabahs::route('/'),
            'create' => CreateNasabah::route('/create'),
            'edit' => EditNasabah::route('/{record}/edit'),
        ];
    }
}
