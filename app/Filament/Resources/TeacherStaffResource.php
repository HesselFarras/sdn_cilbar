<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherStaffResource\Pages;
use App\Models\TeacherStaff;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeacherStaffResource extends Resource
{
    protected static ?string $model = TeacherStaff::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Guru & Tenaga Pendidik';
    protected static ?string $pluralModelLabel = 'Guru & Tenaga Pendidik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap & Gelar')
                        ->required(),

                    Forms\Components\TextInput::make('role')
                        ->label('Jabatan / Guru Kelas')
                        ->placeholder('Contoh: Wali Kelas 1A, Kepala Sekolah')
                        ->required(),

                    Forms\Components\FileUpload::make('image_url')
                        ->label('Foto Profil Resmi')
                        ->image()
                        ->directory('teachers')
                        ->required(),

                    Forms\Components\TextInput::make('sort_order')
                        ->label('Urutan Tampilan (Hirarki)')
                        ->numeric()
                        ->default(0)
                        ->helpText('Makin kecil angkanya, makin atas posisinya di web depan.'),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_url')->label('Foto')->circular(),
                Tables\Columns\TextColumn::make('name')->label('Nama')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('role')->label('Jabatan'),
                Tables\Columns\TextColumn::make('sort_order')->label('Order')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTeacherStaff::route('/'),
            'create' => Pages\CreateTeacherStaff::route('/create'),
            'edit' => Pages\EditTeacherStaff::route('/{record}/edit'),
        ];
    }
}
