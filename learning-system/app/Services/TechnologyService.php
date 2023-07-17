<?php

namespace App\Services;
use App\Models\Technology;

class TechnologyService {
    public function create(int $createdBy, string $name, string $description) : void {
        Technology::insert([
            'created_by'    => $createdBy,
            'name'          => $name,
            'description'   => $description
        ]);
    }

    public function read(){
        //
    }

    public function update(){
        //
    }

    public function delete(){
        //
    }
}
?>
