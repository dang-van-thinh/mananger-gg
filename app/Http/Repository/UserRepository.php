<?php

namespace App\Http\Repository;

use App\Models\Role;
use App\Models\User;

class UserRepository
{

    public function index()
    {
        return User::with('role')->latest('id')->paginate(5);
    }

    public function find($id)
    {
        return User::find($id);
    }

    public function store(array $data)
    {
        return User::create($data);
    }

    public function update($id, array $data)
    {
        $user = User::find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return true;
    }
}
