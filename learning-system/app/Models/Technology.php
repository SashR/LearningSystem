<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'technology_id';

    public function careers(){
        return $this->belongsToMany(\App\Models\CareerTechnology::class, 'career_technologies');
    }

    public function subjects(){
        return $this->belongsToMany(\App\Model\SubjectTechnology::class, 'subject_technologies');
    }
}
