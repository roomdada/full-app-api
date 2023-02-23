<?php

namespace App\Http\Livewire\Tables;

use Filament\Tables;
use Livewire\Component;
use App\Models\Category;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
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
            Tables\Columns\ImageColumn::make('image')->sortable()->searchable()->label('Image')->circular(),
            Tables\Columns\TextColumn::make('courses_count')->sortable()->label('Services associés'),

         ];
    }

   protected function getTableActions(): array
   {
      return [
      Action::make('show')
            ->label('')
            ->color('primary')
            ->icon('heroicon-o-eye')
            ->url(fn (Category $record): string => route('app.categories.show', $record)),
        Action::make('edit')
            ->label('')
            ->color('warning')
            ->icon('heroicon-o-pencil')
            ->url(fn (Category $record): string => route('app.categories.edit', $record)),

      ];
   }


   protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('Supprimer')
                ->action(fn (Collection $records) => $records->each->delete())
                ->requiresConfirmation()
                ->modalSubheading('Êtes-vous sûr de vouloir supprimer ces catégories ?')
                ->modalButton('Oui, je suis sûr')
                ->deselectRecordsAfterCompletion()
        ];
    }

    public function render()
    {
        return view('livewire.tables.category-table');
    }
}
