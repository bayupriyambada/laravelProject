<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = ['name', 'categories_id'];

    public function category()
    {
        return $this->belongsTo(Categories::class, "categories_id", "id");
    }

}
