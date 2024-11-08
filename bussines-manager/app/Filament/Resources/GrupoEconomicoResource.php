<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GrupoEconomicoResource\Pages;
use App\Filament\Resources\GrupoEconomicoResource\RelationManagers;
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
use App\Filament\Exports\GrupoEconomicoExporter;
use Tapp\FilamentAuditing\RelationManagers\AuditsRelationManager;

class GrupoEconomicoResource extends Resource
{
    protected static ?string $model = GrupoEconomico::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')->required()->string()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')->label('Nome')->sortable()->searchable(),
                TextColumn::make('bandeiras_count')
                    ->label('Bandeiras')
                    ->counts('bandeiras')
                    ->sortable(),
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

            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(GrupoEconomicoExporter::class)
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
            AuditsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGrupoEconomicos::route('/'),
            'create' => Pages\CreateGrupoEconomico::route('/create'),
            'edit' => Pages\EditGrupoEconomico::route('/{record}/edit'),
        ];
    }
}
