<?php

namespace App\Filament\Resources\Nasabahs\Pages;

use App\Filament\Resources\Nasabahs\NasabahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;

class ListNasabahs extends ListRecords
{
    protected static string $resource = NasabahResource::class;

    
    public function getTitle(): string
    {
        return 'Daftar Nasabah';
    }


    public function getSubheading(): string|Htmlable|null
    {
        return 'Berikut adalah daftar seluruh nasabah yang terdaftar. Anda bisa mencari, mengedit, atau menghapus data.';
    }
    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
             ->label('Tambah Nasabah Baru')
             ->icon('heroicon-m-plus')
        ];
    }
}
