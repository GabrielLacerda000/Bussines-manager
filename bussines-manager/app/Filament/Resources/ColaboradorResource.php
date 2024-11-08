<?php

namespace App\Filament\Resources;

use App\Filament\Exports\ColaboradorExporter;
use App\Filament\Resources\ColaboradorResource\Pages;
use App\Filament\Resources\ColaboradorResource\RelationManagers;
use App\Models\Colaborador;
use App\Models\Unidade;
use App\Rules\ValidCpf;
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

class ColaboradorResource extends Resource
{
    protected static ?string $model = Colaborador::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Colaboradores';

    protected static ?string $modelLabel = 'Colaboradores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nome')->required()->string(),
                TextInput::make('email')->required()->email(),
                TextInput::make('cpf')
                    ->required()
                    ->string()
                    ->rules([new ValidCpf])
                    ->mask('999.999.999-99'),
                Select::make('unidade_id')
                    ->label('Unidade')
                    ->options(Unidade::all()->pluck('nome_fantasia', 'id'))
                    ->required()
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nome')->label('Nome')->searchable(),
                TextColumn::make('email')->label('Email')->searchable(),
                TextColumn::make('cpf')->label('CPF')->searchable(),
                TextColumn::make('unidade.nome_fantasia')
                    ->label('Unidade')
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
                SelectFilter::make('unidade')
                    ->relationship('unidade', 'nome')
                    ->searchable()
            ])
            ->headerActions([
                ExportAction::make()
                    ->exporter(ColaboradorExporter::class)
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
            'index' => Pages\ListColaboradors::route('/'),
            'create' => Pages\CreateColaborador::route('/create'),
            'edit' => Pages\EditColaborador::route('/{record}/edit'),
        ];
    }
}
