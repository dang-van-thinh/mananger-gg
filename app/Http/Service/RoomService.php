<?php

namespace App\Http\Service;

use App\Http\Repository\RoomReponsitory;
use App\Http\Requests\room\CreateRoomRequest;
use App\Http\Requests\room\UpdateRoomRequest;

class RoomService
{
    protected $roomReponsitory;

    public function __construct(RoomReponsitory $roomReponsitory)
    {
        $this->roomReponsitory = $roomReponsitory;
    }

    public function alls(){
        return $this->roomReponsitory->alls();
    }

    public function getAll()
    {
        $listRoom = $this->roomReponsitory->getAll();
        return view('page.room.list', compact('listRoom'));
    }

    public function find($id)
    {
        return $this->roomReponsitory->find($id);
    }
    public function create(CreateRoomRequest $request)
    {
        $data = [
            'name' => $request->name,
            'capacity' => $request->capacity,
            'location' => $request->location,
        ];

        return $this->roomReponsitory->create($data);
    }

    public function update( UpdateRoomRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'capacity' => $request->capacity,
            'location' => $request->location,

        ];
        return $this->roomReponsitory->update($id, $data);
    }

    public function delete($id)
    {
        return $this->roomReponsitory->delete($id);
    }



}
