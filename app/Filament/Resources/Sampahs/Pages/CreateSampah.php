<?php

namespace App\Filament\Resources\Sampahs\Pages;

use App\Filament\Resources\Sampahs\SampahResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;
use Illuminate\Contracts\Support\Htmlable;

class CreateSampah extends CreateRecord
{
    protected static string $resource = SampahResource::class;

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
        return parent::getCreateFormAction()
        ->label('Simpan')
        ->icon('heroicon-m-check');
    }

    protected function getCreatedNorificationTitle(): string
        {
            return "Data sampah berhasil disimpan";
        }

    protected function getCancelFormAction (): Action
    {
        return parent::getCancelFormAction()
        ->label('Batal');
    
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
        ->label('Simpan & Tambah Data')
        ->color('gray');
    }

    public function getSubheading(): ?string
    {
        return "Silahkan isi data di bawah ini untuk menambahkan daftar sampah ke dalam sistem";
    }

    protected function getredirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
