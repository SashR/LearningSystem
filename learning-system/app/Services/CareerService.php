<?php

namespace App\Services;
use App\Models\Career;
use Illuminate\Database\Eloquent\Collection;

class CareerService {
    public function read() : Collection {
        return Career::
        select(
            'career_id', // Reference
            'main_career_id',   // Fetch main name
            ''
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

    public function update(){
        // Update a career
    }
}

?>
