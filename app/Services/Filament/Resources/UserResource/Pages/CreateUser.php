<?php

namespace App\Services\Filament\Resources\UserResource\Pages;

use App\Services\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
