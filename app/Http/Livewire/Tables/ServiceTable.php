<?php

namespace App\Http\Livewire\Tables;

use App\Models\Course;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables;

class ServiceTable extends Component implements Tables\Contracts\HasTable
{
     use InteractsWithTable;


    protected function getTableQuery(): Builder
    {
        return Course::query()->with('user')->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->label('Créé le'),
            Tables\Columns\TextColumn::make('name')->sortable()->searchable()->label('Titre'),
            Tables\Columns\TextColumn::make('user.full_name')->sortable()->searchable()->label('Prestataire'),
            Tables\Columns\TextColumn::make('category.name')->sortable()->searchable()->label('Categorie'),

         ];
    }

    public function render()
    {
        return view('livewire.tables.service-table');
    }
}
