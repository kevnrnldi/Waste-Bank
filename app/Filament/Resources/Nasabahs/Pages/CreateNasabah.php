<?php

namespace App\Filament\Resources\Nasabahs\Pages;

use App\Filament\Resources\Nasabahs\NasabahResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;

class CreateNasabah extends CreateRecord
{
    protected static string $resource = NasabahResource::class;

    protected function getCreateFormAction(): \Filament\Actions\Action
    {
         return parent::getCreateFormAction()
         ->label('Simpan')
         ->icon('heroicon-m-check');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Data nasabah berhasil disimpan';
    }

    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Simpan & Tambah Lagi')
            ->color('gray');
    }

    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
        ->label('Batal');
    }

    public function getSubheading(): ?string
    {
        return "Silakan isi formulir di bawah ini untuk mendaftarkan nasabah baru ke dalam sistem.";
    }

    public function getTitle(): string
    {
        return 'Pendaftaran Nasabah Baru';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}

