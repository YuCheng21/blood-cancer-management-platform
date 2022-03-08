<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id',
        'date',
        'physical_strength',
        'symptom',
        'hospital',
    ];

    public function cases(){
        return $this->belongsTo(CaseModel::class, 'case_id', 'id');
    }
}
