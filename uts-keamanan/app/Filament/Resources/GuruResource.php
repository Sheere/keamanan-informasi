<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GuruResource\Pages;
use App\Models\Guru;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;

class GuruResource extends Resource
{
    protected static ?string $model = Guru::class;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')->required(),
                Forms\Components\TextInput::make('nip')->required()->unique(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\Textarea::make('alamat'),
                Forms\Components\TextInput::make('telepon'),
                Forms\Components\FileUpload::make('foto')->directory('foto-guru')->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama'),
                Tables\Columns\TextColumn::make('nip'),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGurus::route('/'),
            'create' => Pages\CreateGuru::route('/create'),
            'edit' => Pages\EditGuru::route('/{record}/edit'),
        ];
    }
}