<?php

namespace App\Filament\Resources\ClassroomResource\RelationManagers;

// use App\Models\teacher;
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
    protected static string $relationship = 'lesson';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Name of lesson')
                    ->maxLength(255)
                    ->required(),
                Forms\Components\Select::make('teacher_id')
                    ->label('Teacher')
                    ->relationship('teachers', 'name')
                    ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('max_hours')
                    ->label('Max Hours')
                    ->numeric()
                    ->required(),
                Forms\Components\Select::make('type')
                    ->label('Type of lesson')
                    ->options([
                        'mandatory' => 'Mandatory',
                        'common' => 'Common',
                        'addition' => 'Addition',
                    ])
                    ->required(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            // ->recordTitleAttribute('teacher_id')
            ->columns([
                Tables\Columns\TextColumn::make('teachers.name'),
                Tables\Columns\TextColumn::make('name')->label('lesson')->searchable()->sortable(),
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
