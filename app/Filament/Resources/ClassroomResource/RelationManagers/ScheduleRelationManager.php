<?php

namespace App\Filament\Resources\ClassroomResource\RelationManagers;

use App\Models\teacher;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ScheduleRelationManager extends RelationManager
{
    protected static string $relationship = 'schedule';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('teacher_id')
                    ->label('Teacher')
                    ->getSearchResultsUsing(fn(string $search): array => teacher::where('name', 'like', "%{$search}%")->limit(50)->pluck('name', 'id')->toArray())
                    ->getOptionLabelUsing(fn($value): ?string => teacher::find($value)?->name)
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('lessons_to')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('lessons_to')
            ->columns([
                Tables\Columns\TextColumn::make('lessons_to')->label('lessons to')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('teacher.name')->label('Teacher')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('teacher.lesson')->label('lesson')->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
