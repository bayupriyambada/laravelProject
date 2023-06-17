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

    // categories
    Route::prefix("categories")->name("categories.")->group(function () {
        Route::get("", CategoriesComponent::class)->name("index");
        Route::get("/create", CreateComponent::class)->name("create");
        Route::get("/{categoriesId}/update", UpdateComponent::class)->name("update");
        Route::delete("/{categoriesId}/delete", CategoriesComponent::class)->name("destroy");
    });
    //books
    Route::prefix("books")->name("books.")->group(function () {
        Route::get("", BooksComponent::class)->name("index");
        Route::get("/create", BooksCreateComponent::class)->name("create");
        Route::get("/{booksId}/update", BooksUpdateComponent::class)->name("update");
        Route::delete("/{booksId}/delete", BooksComponent::class)->name("destroy");
    });


    Route::get("/produk/{produkId}/tags"); // list tags in produk
    Route::get("/produk/{produkId}/tags/{tagsId}"); // update tags in produk
    Route::get("/produk/{produkId}/tags/1"); // update tags in produk
});
