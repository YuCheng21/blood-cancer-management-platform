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

        'hometown_id',
        'hometown_other',
        'education_id',
        'marriage_id',
        'religion_id',
        'religion_other',
        'profession_id',
        'profession_detail_id',
        'income_id',
        'source_id',

        'diagnosed',
        'date',
        'transplant_type_id',
        'transplant_type_other',
        'disease_type_id',
        'disease_type_other',
        'disease_state_id',
        'disease_class_id',
    ];

    public function gender(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Gender::class);
    }

    public function hometown(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Hometown::class);
    }

    public function education(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Education::class);
    }
    public function marriage(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Marriage::class);
    }
    public function religion(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Religion::class);
    }
    public function profession(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Profession::class);
    }
    public function profession_detail(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ProfessionDetail::class);
    }
    public function income(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Income::class);
    }
    public function source(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Source::class);
    }

    public function transplant_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TransplantType::class);
    }

    public function disease_type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DiseaseType::class);
    }

    public function disease_state(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DiseaseState::class);
    }

    public function disease_class(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(DiseaseClass::class);
    }

    public function case_blood_components(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CaseBloodComponent::class, 'case_id', 'id');
    }

    public function case_tasks(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CaseTask::class, 'case_id', 'id');
    }

    public function case_messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CaseMessage::class, 'case_id', 'id');
    }

    public function medicine_records(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MedicineRecord::class, 'case_id', 'id');
    }

    public function side_effect_records(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(SideEffectRecord::class, 'case_id', 'id');
    }

    public function report_records(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ReportRecord::class, 'case_id', 'id');
    }

    public function image_records(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ImageRecord::class, 'case_id', 'id');
    }
}
