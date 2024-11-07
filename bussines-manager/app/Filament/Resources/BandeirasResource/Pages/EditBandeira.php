<?php

namespace App\Filament\Resources\BandeirasResource\Pages;

use App\Filament\Resources\BandeiraResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBandeira extends EditRecord
{
    protected static string $resource = BandeiraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
