<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'week',
    ];

    public function task(){
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
}
