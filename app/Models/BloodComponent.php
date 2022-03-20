<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodComponent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function case_blood_components(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CaseBloodComponent::class, 'blood_id', 'id');
    }
}
