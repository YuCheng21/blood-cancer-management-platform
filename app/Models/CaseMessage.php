<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_id',
        'message_id',
        'state',
    ];
}
