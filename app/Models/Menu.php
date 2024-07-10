<?php

namespace App\Models;

use Filament\Forms\Set;
use Nette\Utils\Random;
use Milon\Barcode\DNS2D;
use Filament\Support\RawJs;
use Illuminate\Support\Str;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Textarea;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_code',
        'name',
        'slug',
        'price',
        'description',
        'image',
    ];

    public static function getForm()
    {
        return [
            TextInput::make('name')
                ->label('Nama menu')
                ->required()
                ->afterStateUpdated(function (Set $set, $state) {
                    $rand = Random::generate(10);
                    $set('qr_code', (new DNS2D)->getBarcodePNGPath(Str::slug($state . '-' . $rand), 'QRCODE', 5, 5));
                    $set('slug', Str::slug($state . '-' . $rand));
                }),
            Hidden::make('qr_code'),
            Hidden::make('slug'),
            TextInput::make('price')
                ->label('Harga')
                ->prefix('Rp')
                ->numeric()
                ->mask(RawJs::make('$money($input)'))
                ->stripCharacters(',')
                ->required(),
            RichEditor::make('description')
                ->label('Deskripsi')
                ->required()
                ->columnSpanFull(),
            FileUpload::make('image')
                ->label('Gambar menu')
                ->image()
                ->imageEditor()
                ->columnSpanFull(),
        ];
    }
}
