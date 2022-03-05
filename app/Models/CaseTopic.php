<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTopic extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_task_id',
        'topic_id',
        'state',
    ];

    public function topic(){
        return $this->belongsTo(Topic::class, 'topic_id', 'id');
    }

    public function case_task(){
        return $this->belongsTo(CaseTask::class, 'case_task_id', 'id');
    }
}
