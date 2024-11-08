<?php

namespace App\Filament\Widgets;

use App\Models\Bandeira;
use App\Models\Colaborador;
use App\Models\GrupoEconomico;
use App\Models\Unidade;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Grupos ecônomicos', GrupoEconomico::count())
             ->descriptionIcon(''),
            Stat::make('Bandeiras', Bandeira::count()),
            Stat::make('Unidades', Unidade::count()),
            Stat::make('Colaboradores', Colaborador::count()),
        ];
    }
}
