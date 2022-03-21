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
        'physical_strength_id',
        'symptom',
        'hospital_id',
        'hospital_other',
    ];

    public function cases(){
        return $this->belongsTo(CaseModel::class, 'case_id', 'id');
    }

    public function physical_strength(){
        return $this->belongsTo(PhysicalStrength::class, 'physical_strength_id', 'id');
    }

    public function hospital(){
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
}
