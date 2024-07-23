<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Tables\Columns\ColumnMenuOrder;
use App\Tables\Columns\ColumnMenuQty;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('order_number')
                    ->label('Nomor Order')
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Nama Pelaggan')
                    ->required(),
                Forms\Components\TextInput::make('table_number')
                    ->label('Nomor Meja')
                    ->numeric()
                    ->required(),
                // Forms\Components\Select::make('menu_id')
                //     ->label('Menu')
                //     ->relationship('menu', 'name')
                //     ->multiple()
                //     ->required(),
                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'dipesan' => 'Dipesan',
                        'dibuat' => 'Dibuat',
                        'selesai' => 'Selesai',
                    ])
                    ->default('dipesan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('Nomor Order')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Pelaggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('table_number')
                    ->label('Nomor Meja')
                    ->searchable(),
                ColumnMenuOrder::make('orderMenu')
                    ->label('Order Menu')
                    ->sortable(),
                ColumnMenuQty::make('orderQty')
                    ->label('Jumlah')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->label('Status')
                    ->color(fn (string $state): string => match ($state) {
                        'dipesan' => 'gray',
                        'dibuat' => 'warning',
                        'selesai' => 'success',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Order')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tanggal Update')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageOrders::route('/'),
        ];
    }
}
