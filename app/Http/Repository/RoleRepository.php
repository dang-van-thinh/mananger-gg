<?php

namespace App\Http\Repository;

use App\Models\Role;

class RoleRepository
{

    public function all()
    {
        return Role::paginate(5);
    }

    public function find($id)
    {
        return Role::find($id);
    }

    public function create(array $data)
    {
        return Role::create($data);
    }

    public function update($id, array $data)
    {
        $role = Role::find($id);
        $role->update($data);
        return $role;
    }

    public function delete($id)
    {
        $role = Role::find($id);
        $role->delete();
        return true;
    }
}
