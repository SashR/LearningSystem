<?php

namespace App\Services;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService {
    public function create(string $name, string $email, string $password) : void {
        User::insert([
            'name'      => $name,
            'email'     => $email,
            'password'  => bcrypt($password)
        ]);
    }

    public function read() : Collection {
        return User::get();
    }

    public function update(){
        //
    }

    public function delete(){
        //
    }
}


?>
