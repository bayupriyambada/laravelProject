<?php

namespace App\Http\Livewire\Pages\Categories;

use App\Models\Categories;
use Livewire\Component;

class UpdateComponent extends Component
{
    public $name;
    public $categoriesId;
    public $findCategories;
    public function mount($categoriesId)
    {
        $this->findCategories = Categories::findOrFail($categoriesId);
        $this->categoriesId = $this->findCategories->id;
        $this->name = $this->findCategories->name;
    }

    protected $rules = [
        'name' => 'required|min:1',
    ];

    public function updateForm()
    {
        $this->validate();
        $updateCategories = Categories::find($this->categoriesId);
        $updateCategories->update([
            'name' => $this->name
        ]);
        session()->flash('message', 'Category successfully updated!');
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.pages.categories.update-component')->layout("template.app");
    }
}
