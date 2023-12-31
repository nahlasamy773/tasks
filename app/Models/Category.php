<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'cat_name', // Correct column name
        'updated_at',
        'created_at',
    ];
    

        public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}
    
}
