<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id',
        'wbc',
        'hb',
        'plt',
        'got',
        'gpt',
        'cea',
        'ca153',
        'bun',
    ];

    public function cases(){
        return $this->belongsTo(CaseModel::class, 'case_id', 'id');
    }
}
