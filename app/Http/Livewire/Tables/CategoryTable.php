<?php

namespace App\Http\Livewire\Tables;

use Filament\Tables;
use Livewire\Component;
use App\Models\Category;
use Filament\Tables\Concerns\InteractsWithTable;
use Illuminate\Contracts\Database\Eloquent\Builder;

class CategoryTable extends Component implements Tables\Contracts\HasTable
{
    use InteractsWithTable;


    protected function getTableQuery(): Builder
    {
        return Category::query()->withCount('courses')->latest();
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('created_at')->sortable()->searchable()->label('Créé le'),
            Tables\Columns\TextColumn::make('name')->sortable()->searchable()->label('Titre'),
            Tables\Columns\TextColumn::make('courses_count')->sortable()->searchable()->label('Services associés'),

         ];
    }

    public function render()
    {
        return view('livewire.tables.category-table');
    }
}
