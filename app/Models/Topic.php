<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'question',
        'question_type',
        'answer',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
    ];

    public function task(){
        return $this->belongsTo(Task::class, 'task_id', 'id');
    }
}
