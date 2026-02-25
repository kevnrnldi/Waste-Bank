<?php

namespace App\Filament\Resources\Sampahs\Pages;

use App\Filament\Resources\Sampahs\SampahResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditSampah extends EditRecord
{
    protected static string $resource = SampahResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
