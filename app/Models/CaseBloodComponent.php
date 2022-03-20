<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseBloodComponent extends Model
{
    use HasFactory;
    protected $fillable = [
        'case_id',
        'blood_id',
        'value',
        'created_at',
        'updated_at',
    ];

    public function case(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(CaseModel::class, 'case_id', 'id');
    }

    public function blood_component(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BloodComponent::class, 'blood_id', 'id');
    }
}
