<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbRegistrationResource\Pages;
use App\Models\PpdbRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PpdbRegistrationResource extends Resource
{
    protected static ?string $model = PpdbRegistration::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationLabel = 'Pendaftaran PPDB';
    protected static ?string $pluralModelLabel = 'Pendaftaran PPDB';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\TextInput::make('student_name')
                        ->label('Nama Calon Siswa')
                        ->required()
                        ->disabled(), // Di-disable agar admin tidak memanipulasi nama pendaftar asli

                    Forms\Components\TextInput::make('nik')
                        ->label('NIK Siswa')
                        ->length(16)
                        ->required()
                        ->disabled(),

                    Forms\Components\TextInput::make('parent_name')
                        ->label('Nama Orang Tua / Wali')
                        ->required()
                        ->disabled(),

                    Forms\Components\TextInput::make('phone_number')
                        ->label('No. Telepon / WhatsApp')
                        ->required()
                        ->disabled(),

                    // HANYA BAGIAN INI YANG BISA DIUBAH OLEH ADMIN SEKOLAH
                    Forms\Components\Select::make('status')
                        ->label('Status Verifikasi Pendaftaran')
                        ->options([
                            'Pending' => 'Pending (Dalam Antrean)',
                            'Diterima' => 'Diterima (Lolos Berkas)',
                            'Ditolak' => 'Ditolak (Berkas Tidak Valid)',
                        ])
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('student_name')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nik')
                    ->label('NIK')
                    ->copyable() // Mempermudah admin menyalin NIK untuk cek Dukcapil
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_name')
                    ->label('Orang Tua'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Diterima' => 'success',
                        'Ditolak' => 'danger',
                        default => 'warning',
                    }),
                Tables\Columns\TextColumn::make('registration_date')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Proses'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPpdbRegistrations::route('/'),
            'create' => Pages\CreatePpdbRegistration::route('/create'),
            'edit' => Pages\EditPpdbRegistration::route('/{record}/edit'),
        ];
    }
}
