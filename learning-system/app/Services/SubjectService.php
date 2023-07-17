<?php

namespace App\Services;

use App\Models\CareerSubject;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;

class SubjectService {
    public function create(int $createdBy, string $name, string $description, int|null $careerID): void{
        DB::transaction(function()use($createdBy, $name, $description, $careerID){
            $subjectID = Subject::insertGetId([
                'created_by'        => $createdBy,
                'name'              => $name,
                'description'       => $description
            ]);

            if(isset($careerID)){
                $this->createCareerSubject($createdBy, $subjectID, $careerID);
            }
        });
    }

    public function createCareerSubject(int $createdBy, int $subjectID, int $careerID): void{
        CareerSubject::insert([
            'created_by'    => $createdBy,
            'career_id'     => $careerID,
            'subject_id'    => $subjectID,
        ]);
    }

    public function read(){
        //
    }

    public function update(){
        //
    }

    public function delete(int $subjectID) : void {
        Subject::where('subject_id', $subjectID)->delete();
    }
}


?>
