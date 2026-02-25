<?php

namespace App\Filament\Resources\Sampahs\Pages;

use App\Filament\Resources\Sampahs\SampahResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListSampahs extends ListRecords
{
    protected static string $resource = SampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()
                ->label('Tambah Sampah Baru')
                ->icon('heroicon-m-plus')
        ];
    }

    public function getTitle (): string
    {
        return 'Daftar Sampah';
    }

    public function getSubheading(): ?string
    {
        return 'Berikut adalah daftar seluruh sampah yang terdaftar. Anda bisa mencari, mengedit, atau menghapus data.';
    }

}
