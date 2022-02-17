<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseModel extends Model
{
    use HasFactory;


    protected $table = 'cases';

    protected $fillable = [
        'account',
        'password',
        'transplantNum',
        'name',
        'gender',
        'birthday',
        'date',
        'transplantType',
        'diseaseType',
        'diseaseState',
        'diseaseClass',
    ];
}
