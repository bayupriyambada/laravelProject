<?php

namespace App\Http\Livewire\Pages;

use App\Models\Books;
use Livewire\Component;

class BooksComponent extends Component
{
    public function destroy($booksId)
    {
        $findBook = Books::find($booksId);
        $findBook->delete();
        session()->flash('message', 'Category ' . $findBook->name . ' successfully deleted!');
        return redirect()->back();
    }
    public function render()
    {
        $allBooks = Books::query()->with("category")->latest()->get();
        // dd($allBooks);

        return view('livewire.pages.books-component', [
            'allBooks' => $allBooks
        ])->layout("template.app");
    }
}
