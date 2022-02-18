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
}
