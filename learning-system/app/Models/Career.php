<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    protected $primaryKey = 'career_id';

    use SoftDeletes;
    use HasFactory;

    public function technologies(){
        return $this->belongsToMany(\App\Models\CareerTechnology::class, 'career_technologies');
    }

    public function subjects(){
        return $this->belongsToMany(\App\Models\Subject::class,'career_subjects');
        // return $this->hasMany(\App\Models\CareerSubject::class,'career_id','career_id');
    }

    public function mainCareer(){
        return $this->hasOne(\App\Models\Career::class,'career_id','main_career_id');
    }

    public function subCareers(){
        return $this->hasMany(\App\Models\Career::class, 'main_career_id','career_id');
    }
}
