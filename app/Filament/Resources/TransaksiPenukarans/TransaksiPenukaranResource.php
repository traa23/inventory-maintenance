<?php

namespace App\Filament\Resources\TransaksiPenukarans;

use App\Filament\Resources\TransaksiPenukarans\Pages\CreateTransaksiPenukaran;
use App\Filament\Resources\TransaksiPenukarans\Pages\EditTransaksiPenukaran;
use App\Filament\Resources\TransaksiPenukarans\Pages\ListTransaksiPenukarans;
use App\Filament\Resources\TransaksiPenukarans\Schemas\TransaksiPenukaranForm;
use App\Filament\Resources\TransaksiPenukarans\Tables\TransaksiPenukaransTable;
use App\Models\TransaksiPenukaran;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TransaksiPenukaranResource extends Resource
{
    protected static ?string $model = TransaksiPenukaran::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nama_pekerja_lapangan';

    public static function form(Schema $schema): Schema
    {
        return TransaksiPenukaranForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransaksiPenukaransTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransaksiPenukarans::route('/'),
            'create' => CreateTransaksiPenukaran::route('/create'),
            'edit' => EditTransaksiPenukaran::route('/{record}/edit'),
        ];
    }
}
