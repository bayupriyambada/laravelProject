<?php

use App\Http\Livewire\Pages\Books\CreateComponent as BooksCreateComponent;
use App\Http\Livewire\Pages\Books\UpdateComponent as BooksUpdateComponent;
use App\Http\Livewire\Pages\BooksComponent;
use App\Http\Livewire\Pages\Categories\CreateComponent;
use App\Http\Livewire\Pages\Categories\UpdateComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Pages\CategoriesComponent;
use App\Http\Livewire\Pages\HomeComponent;
use App\Http\Livewire\Pages\LoginComponent;

Route::middleware(['guest'])->group(function () {
    Route::get("/login", LoginComponent::class)->name("login");
});

Route::middleware(['auth'])->group(function () {
    Route::get("/", HomeComponent::class)->name("dashboard");
    Route::get("/books", BooksComponent::class)->name("books");
    Route::get("/categories", CategoriesComponent::class)->name("categories");
    Route::get("/categories/create", CreateComponent::class)->name("categories.create");
    Route::get("/categories/{categoriesId}/update", UpdateComponent::class)->name("categories.update");
    Route::delete("/categories/{categoriesId}/delete", CategoriesComponent::class)->name("categories.destroy");

    //books
    Route::get("/books", BooksComponent::class)->name("books");
    Route::get("/books/create", BooksCreateComponent::class)->name("books.create");
    Route::get("/books/{booksId}/update", BooksUpdateComponent::class)->name("books.update");
    Route::delete("/books/{booksId}/delete", BooksComponent::class)->name("books.destroy");
});
