<?php

namespace App\Filament\App\Pages\Auth;

use App\Models\User;
use App\Models\Pondok;
use App\Models\Sekolah;

use Filament\Forms;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\Select;
use Filament\Pages\Auth\Register as BaseRegister;

class Register extends BaseRegister
{
    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        Tabs::make('tabs')
                            ->tabs([
                                Tabs\Tab::make('account')
                                    ->label('Akun')
                                    ->icon('heroicon-o-user')
                                    ->schema([
                                        $this->getNameFormComponent(),
                                        $this->getEmailFormComponent(),
                                        $this->getPasswordFormComponent(),
                                        $this->getPasswordConfirmationFormComponent(),
                                    ]),
                                Tabs\Tab::make('profile')
                                    ->label('Profil')
                                    ->icon('heroicon-o-user-circle')
                                    ->schema([
                                        Forms\Components\Select::make('jenis_kelamin')
                                            ->label('Jenis Kelamin')
                                            ->options([
                                                'L' => 'Laki-laki',
                                                'P' => 'Perempuan',
                                            ])
                                            ->required(),
                                        Forms\Components\TextInput::make('tempat_lahir')
                                            ->label('Tempat Lahir')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\DatePicker::make('tanggal_lahir')
                                            ->label('Tanggal Lahir')
                                            ->required()
                                            ->rule(['date']),
                                        Forms\Components\TextInput::make('alamat')
                                            ->label('Alamat')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('no_hp_1')
                                            ->label('No. Handphone')
                                            ->required()
                                            ->rule(['numeric']),
                                        Forms\Components\TextInput::make('no_hp_2')
                                            ->label('No. HP Alternatif')
                                            ->helperText('No. HP yang dapat dihubungi')
                                            ->required()
                                            ->rule(['numeric']),
                                    ]),
                                Tabs\Tab::make('school')
                                    ->label('Sekolah')
                                    ->icon('heroicon-o-academic-cap')
                                    ->schema([
                                        Forms\Components\Select::make('id_sekolah')
                                            ->label('Asal Sekolah')
                                            ->relationship('sekolah', 'nama')
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('npsn')
                                                    ->label('NPSN'),
                                                Forms\Components\TextInput::make('nama')
                                                    ->label('Nama Sekolah')
                                                    ->required(),
                                                Forms\Components\TextInput::make('alamat')
                                                    ->label('Alamat Sekolah')
                                                    ->required(),
                                                Forms\Components\TextInput::make('no_hp')
                                                    ->label('No. Handphone')
                                                    ->required()
                                                    ->rule(['numeric']),
                                            ])
                                            ->required()
                                ]),
                                Tabs\Tab::make('pondok')
                                    ->label('Pondok')
                                    ->icon('heroicon-o-home')
                                    ->schema([
                                        Forms\Components\Select::make('id_pondok')
                                            ->label('Asal Pondok')
                                            ->relationship('pondok', 'nama')
                                            ->getOptionLabelFromRecordUsing(fn ($record) => $record->nama . ' - ' . $record->kelurahan . ', ' . $record->kecamatan . ', ' . $record->kabupaten_kota . ', ' . $record->provinsi)
                                            ->searchable(['nama', 'alamat', 'kelurahan', 'kecamatan', 'kabupaten_kota', 'provinsi'])
                                            ->preload()
                                            ->createOptionForm([
                                                Forms\Components\TextInput::make('nspp')
                                                    ->label('NSPP'),
                                                Forms\Components\TextInput::make('nama')
                                                    ->label('Nama Pondok')
                                                    ->required(),
                                                Forms\Components\TextInput::make('alamat')
                                                    ->label('Alamat Pondok')
                                                    ->required(),
                                                Forms\Components\TextInput::make('kelurahan')
                                                    ->label('Kelurahan')
                                                    ->required(),
                                                Forms\Components\TextInput::make('kecamatan')
                                                    ->label('Kecamatan')
                                                    ->required(),
                                                Forms\Components\TextInput::make('kabupaten_kota')
                                                    ->label('Kabupaten/Kota')
                                                    ->required(),
                                                Forms\Components\TextInput::make('provinsi')
                                                    ->label('Provinsi')
                                                    ->required(),
                                                Forms\Components\TextInput::make('no_hp')
                                                    ->label('No. Handphone')
                                                    ->required()
                                                    ->rule(['numeric']),
                                            ])
                                            ->required(),
                                    ]),
                            ]),
                    ])
                    ->model(User::class)
                    ->statePath('data'),
            ),
        ];
    }
}
