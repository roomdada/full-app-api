<?php

namespace App\Http\Livewire\Forms\Categories;

use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use App\Actions\Category\StoreCategoryAction;
use Filament\Forms\Concerns\InteractsWithForms;

class Create extends Component implements HasForms
{
    use InteractsWithForms;

    public $state = [
        'name' => '',
        'image' => '',
    ];

    public function mount()
    {
        $this->form->fill($this->state);
    }


    protected function getFormSchema(): array
    {
        return [
            TextInput::make('state.name')
                ->label('Name')
                ->required(),
            FileUpload::make('state.image')
                ->label('Image')
                ->image()
                ->imageResizeTargetHeight(300)
                ->imageResizeTargetWidth(300)
                ->required(),
        ];
    }

    public function saveCategory(StoreCategoryAction $storeCategoryAction)
    {
        $data = $this->validate();
        $categoryDTO = new \App\DataObjects\CategoryDataObject(...$data['state']);
        $category = $storeCategoryAction->execute($categoryDTO);
        flasher("La catégorie {$category->name} a été créée avec succès");
        return redirect()->route('app.categories.index');
    }

    public function render()
    {
        return view('livewire.forms.categories.create');
    }
}
