<?php

namespace App\Filament\Resources\TransaksiPenukarans\Pages;

use App\Filament\Resources\TransaksiPenukarans\TransaksiPenukaranResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransaksiPenukarans extends ListRecords
{
    protected static string $resource = TransaksiPenukaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
