<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;

class UserTable extends Component implements \Filament\Tables\Contracts\HasTable
{
    use \Filament\Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return \App\Models\User::query()->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            \Filament\Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->label('Créé le'),
            \Filament\Tables\Columns\TextColumn::make('full_name')->sortable()->searchable()->label('Nom complet'),
            \Filament\Tables\Columns\TextColumn::make('email')->sortable()->searchable()->label('Email'),
            \Filament\Tables\Columns\TextColumn::make('contact')->sortable()->searchable()->label('Téléphone'),
        ];
    }



    public function render()
    {
        return view('livewire.tables.user-table');
    }
}
