<?php

namespace App\Http\Repository;
use App\Models\Session;

class SessionReponsitory
{

    public function getAll()
    {
        return Session::paginate(10);
    }

    public function find($id)
    {
        return Session::findOrFail($id);
    }

    public function create($data)
    {
        return Session::create($data);
    }

    public function update($id,$data)
    {
        $session = Session::findOrFail($id);
        return $session->update($data);
    }

    public function delete($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();
        return true;
    }
}