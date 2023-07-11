<?php

namespace App\Services;
use App\Models\Career;
use Illuminate\Database\Eloquent\Collection;

class CareerService {
    public function read() : Collection {
        return Career::
        join('careers AS mc','mc.career_id','careers.main_career_id')
        ->join('users AS u','u.id','careers.created_by')
        ->select(
            'careers.career_id',
            'mc.name AS Main Career',
            'u.name AS Created By',
            'careers.name AS Title',
            'careers.description AS Description',
            'careers.created_at AS Created At'
        )
        ->get();
    }

    public function create(int|null $mainCareerID, int $createdBy, string $name, string $description) : void {
        Career::insert([
            'main_career_id'    => $mainCareerID,
            'created_by'        => $createdBy,
            'name'              => $name,
            'description'       => $description
        ]);
    }

    public function update(int $careerID, string $name, string $description) : void {
        Career::where('career_id',$careerID)->update([
            'name'              => $name,
            'description'       => $description
        ]);
    }

    public function changeMainCareer(int $careerID, int $mainCareerID) : void {
        Career::where('career_id',$careerID)->update([
            'main_career_id'    => $mainCareerID
        ]);
    }
}

?>
