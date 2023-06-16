<?php

namespace App\Http\Livewire\Pages;

use App\Models\Books;
use App\Models\Categories;
use Livewire\Component;

class CategoriesComponent extends Component
{
    public function destroy($categoriesId)
    {
        $findCategories = Categories::find($categoriesId);
        $checkBooks = Books::where("categories_id", $findCategories->id)->first();
        if ($checkBooks) {
            session()->flash('warning', 'Have a relation books');
        } else {
            $findCategories->delete();
            session()->flash('message', 'Category ' . $findCategories->name . ' successfully deleted!');
            return redirect()->back();
        }
    }
    public function render()
    {
        $allCategories = Categories::query()->latest()->get();
        return view('livewire.pages.categories-component', [
            'allCategories' => $allCategories
        ])->layout("template.app");
    }
}
