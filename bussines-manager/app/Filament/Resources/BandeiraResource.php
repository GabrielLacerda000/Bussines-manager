<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BandeirasResource\Pages;
use App\Filament\Resources\BandeirasResource\RelationManagers;
use App\Models\Bandeira;
use App\Models\GrupoEconomico;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BandeiraResource extends Resource
{
    protected static ?string $model = Bandeira::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')->required()->string(),
                Select::make('grupo_economico_id')
                ->label('Grupo Econômico')
                ->options(GrupoEconomico::all()->pluck('nome', 'id'))
                ->required()
                ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')
                ->label('Nome')
                ->sortable()
                ->searchable(),
                TextColumn::make('grupoEconomico.nome')
                ->label('Grupo Ecônomico')
                ->sortable()
                ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListBandeira::route('/'),
            'create' => Pages\CreateBandeira::route('/create'),
            'view' => Pages\ViewBandeira::route('/{record}'),
            'edit' => Pages\EditBandeira::route('/{record}/edit'),
        ];
    }
}
