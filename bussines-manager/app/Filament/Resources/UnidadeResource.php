<?php

namespace App\Filament\Resources;

use App\Filament\Exports\UnidadeExporter;
use App\Filament\Resources\UnidadeResource\Pages;
use App\Filament\Resources\UnidadeResource\RelationManagers;
use App\Models\Bandeira;
use App\Models\Unidade;
use App\Rules\ValidCnpj;
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

class UnidadeResource extends Resource
{
    protected static ?string $model = Unidade::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome_fantasia')
                    ->required()
                    ->string()
                    ->label('Nome fantasia'),
                TextInput::make('razao_social')
                    ->required()
                    ->string()
                    ->label('Razão social'),
                TextInput::make('cnpj')
                    ->required()
                    ->string()
                    ->rules([new ValidCnpj])
                    ->mask('99.999.999/9999-99'),
                Select::make('bandeira_id')
                    ->label('Bandeira')
                    ->options(Bandeira::all()->pluck('nome', 'id'))
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome_fantasia')
                    ->label('Nome fantasia')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('razao_social')
                    ->label('Razão social')
                    ->sortable()->searchable(),
                TextColumn::make('cnpj')
                    ->label('CNPJ')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('bandeira.nome')
                    ->label('Bandeira')
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
                SelectFilter::make('bandeira')
                    ->relationship('bandeira', 'nome')
                    ->searchable()
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(UnidadeExporter::class)
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
            'index' => Pages\ListUnidades::route('/'),
            'create' => Pages\CreateUnidade::route('/create'),
            'edit' => Pages\EditUnidade::route('/{record}/edit'),
        ];
    }
}
