<?php

namespace App\Filament\Resources;

use App\Filament\Exports\BandeiraExporter;
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
use Filament\Tables\Actions\ExportAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;


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
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                SelectFilter::make('grupoEconomico')
                    ->relationship('grupoEconomico', 'nome')
                    ->searchable()
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(BandeiraExporter::class)
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            AuditsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBandeira::route('/'),
            'create' => Pages\CreateBandeira::route('/create'),
            'edit' => Pages\EditBandeira::route('/{record}/edit'),
        ];
    }
}
