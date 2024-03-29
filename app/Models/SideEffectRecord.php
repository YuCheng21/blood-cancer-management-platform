<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class SideEffectRecord extends Model
{
    protected $fillable = [
        'case_id',
        'date',
        'symptom',
        'difficulty',
        'severity',
        'has_image',
        'path',
        'caption',
    ];
    use HasFactory;

    public function path()
    {
        if (is_null($this['path'])){
            return null;
        } elseif (strpos($this['path'], "http") === 0) {
            return $this['path'];
        } else {
            return asset(Storage::disk('public')->url($this['path']));
        }
    }

    public function cases(){
        return $this->belongsTo(CaseModel::class, 'case_id', 'id');
    }
}
