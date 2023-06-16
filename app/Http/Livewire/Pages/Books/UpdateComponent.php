<?php

namespace App\Http\Livewire\Pages\Books;

use App\Models\Books;
use App\Models\Categories;
use Livewire\Component;

class UpdateComponent extends Component
{
    public $name;
    public $categories_id;
    public $booksId;
    public $findBooks;
    public function mount($booksId)
    {
        $this->findBooks = Books::findOrFail($booksId);
        $this->booksId = $this->findBooks->id;
        $this->name = $this->findBooks->name;
        $this->categories_id = $this->findBooks->categories_id;
    }

    protected $rules = [
        'name' => 'required|min:1',
        'categories_id' => 'required',
    ];

    public function updateForm()
    {
        $this->validate();
        $updateBooks = Books::find($this->booksId);
        $updateBooks->update([
            'name' => $this->name,
            'categories_id' => $this->categories_id
        ]);
        session()->flash('message', 'Books successfully updated!');
        return redirect()->route("books");
    }
    public function render()
    {
        $allCategories = Categories::query()->get();
        return view('livewire.pages.books.update-component', [
            'allCategories' => $allCategories
        ])->layout("template.app");
    }
}
