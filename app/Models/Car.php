<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Category;


class Car extends Model
{
    use HasFactory ,SoftDeletes;


    protected $fillable = [
        'title',
        'description',
        'published',
        'image',
        'category_id',
        ];


        public function category()
        {
            return $this->belongsTo(Category::class, 'category_id');

        }

}





