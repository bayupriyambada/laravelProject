<?php

namespace App\Http\Livewire\Pages;

use App\Models\Categories;
use Livewire\Component;

class CategoriesComponent extends Component
{
    public function destroy($categoriesId)
    {
        $findCategories = Categories::find($categoriesId);
        $findCategories->delete();
        session()->flash('message', 'Category ' . $findCategories->name . ' successfully deleted!');
        return redirect()->back();
    }
    public function render()
    {
        $allCategories = Categories::query()->latest()->get();
        return view('livewire.pages.categories-component', [
            'allCategories' => $allCategories
        ])->layout("template.app");
    }
}
