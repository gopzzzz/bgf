<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Item extends Model
{
     public function category()
{
    return $this->belongsTo(Categories::class, 'category_id');
}

}