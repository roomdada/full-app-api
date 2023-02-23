<?php

namespace App\Http\Livewire\Forms\Categories;

use Livewire\Component;
use App\Models\Category;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use App\Actions\Category\UpdateCategoryAction;
use Filament\Forms\Concerns\InteractsWithForms;

class Update extends Component implements HasForms
{
     use InteractsWithForms;

    public $state = [
        'name' => '',
        'image' => '',
    ];

    public $category;

    public function mount(Category $category)
    {
        $this->state = [
            'name' => $category->name,
            'image' => $category->image,
        ];

        $this->category = $category;
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
                ->required(),
        ];
    }

    public function updateCategory(UpdateCategoryAction $updateCategoryAction)
    {
        $data = $this->validate();
        $categoryDTO = new \App\DataObjects\CategoryDataObject(...$data['state']);
        $updateCategoryAction->execute($categoryDTO, $this->category);
        flasher("La catégorie a été modifiée avec succès");
        return redirect()->route('app.categories.index');
    }

    public function render()
    {
        return view('livewire.forms.categories.update');
    }
}
