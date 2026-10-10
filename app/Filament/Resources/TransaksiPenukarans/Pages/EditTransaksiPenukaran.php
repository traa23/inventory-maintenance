<?php

namespace App\Filament\Resources\TransaksiPenukarans\Pages;

use App\Filament\Resources\TransaksiPenukarans\TransaksiPenukaranResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTransaksiPenukaran extends EditRecord
{
    protected static string $resource = TransaksiPenukaranResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
