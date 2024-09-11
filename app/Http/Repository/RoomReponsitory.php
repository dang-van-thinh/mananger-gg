<?php

namespace App\Http\Repository;
use App\Models\Room;

class RoomReponsitory
{

    public function alls()
    {
        return Room::all();
    }
    public function getAll()
    {
        return Room::paginate(10);
    }

    public function find($id)
    {
        return Room::findOrFail($id);
    }

    public function create($data)
    {
        return Room::create($data);
    }

    public function update($id,$data)
    {
        $room = Room::findOrFail($id);
        return $room->update($data);
    }

    public function delete($id)
    {
        $room = Room::findOrFail($id);
        $room->delete();
        return true;
    }
}
