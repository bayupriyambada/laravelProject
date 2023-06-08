<?php

namespace App\Http\Livewire\Pages\Books;

use App\Models\Books;
use Livewire\Component;
use App\Models\Categories;

class CreateComponent extends Component
{
    public $name;
    public $categories_id;
    protected $rules = [
        'name' => 'required|min:1',
        'categories_id' => 'required',
    ];

    public function create()
    {
        $this->validate();

        Books::create([
            'name' => $this->name,
            'categories_id' => $this->categories_id
        ]);
        session()->flash('message', 'Books successfully created!');
        return redirect(back());
    }
    public function render()
    {
        $allCategories = Categories::query()->get();
        return view('livewire.pages.books.create-component', [
            'allCategories' => $allCategories
        ])->layout("template.app");
    }
}
