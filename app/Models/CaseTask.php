<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id',
        'task_id',
        'week',
        'start_at',
        'state',
    ];

    public function task(){
        return $this->hasOne(Task::class, 'id', 'task_id');
    }
}
