<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    protected $table = 'cases';

    use HasFactory;

    protected $fillable = [
        'account',
        'password',
        'transplant_num',
        'name',
        'gender_id',
        'birthday',
        'date',
        'transplant_type_id',
        'disease_type_id',
        'disease_state_id',
        'disease_class_id',
    ];

    public function gender(){
        return $this->belongsTo(Gender::class);
    }

    public function transplant_type(){
        return $this->belongsTo(TransplantType::class);
    }

    public function disease_type(){
        return $this->belongsTo(DiseaseType::class);
    }

    public function disease_state(){
        return $this->belongsTo(DiseaseState::class);
    }

    public function disease_class(){
        return $this->belongsTo(DiseaseClass::class);
    }

    public function blood_components(){
        return $this->hasMany(BloodComponent::class, 'case_id', 'id');
    }

    public function case_tasks(){
        return $this->hasMany(CaseTask::class, 'case_id', 'id');
    }
}
