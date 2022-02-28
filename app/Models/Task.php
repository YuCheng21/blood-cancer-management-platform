<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function category_information(){
        return $this->belongsTo(CategoryInformation::class, 'category_1', 'category_1');
    }
}
