<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'subject_id';

    public function careers(){
        return $this->belongsToMany(\App\Models\Subject::class,'career_subjects');
    }

    public function topics(){
        return $this->hasMany(\App\Models\Topic::class, 'subject_id', 'subject_id');
    }

    public function technologies(){
        return $this->belongsToMany(\App\Models\SubjectTechnology::class, 'subject_technologies');
    }
}
