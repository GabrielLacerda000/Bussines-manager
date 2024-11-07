<?php

namespace App\Filament\Resources\BandeirasResource\Pages;

use App\Filament\Resources\BandeiraResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBandeira extends ListRecords
{
    protected static string $resource = BandeiraResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
