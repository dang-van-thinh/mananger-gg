<?php

namespace App\Http\Repository;

use App\Models\Classes;
use App\Models\Session;

class SessionReponsitory
{

    // lay danh sach tat ca ca hoc ko co phan trang
    public function alls()
    {
        return Session::all();
    }

    // lay danh sach ca hoc theo phong va ngay , thu
    public function getSessionByRoomAndStartDateAndEndDateAndDayOfWeeks($room, $startDate, $endDate, $dayOfWeeks)
    {
        $data = Session::whereHas('classes', function($query) use ($room, $startDate, $endDate, $dayOfWeeks) {
            $query->where('room_id', $room)
                ->whereDate('start_date', '<=', $startDate)
                ->whereDate('end_date', '>=', $endDate)
                ->whereHas('dayOfClass', function($q) use ($dayOfWeeks) {
                    $q->whereIn('day_of_week_id', $dayOfWeeks);
                });
        })->get();
//         dd($data);
         return $data;

        // viet dieu kien truy van
        // SELECT s.* FROM rooms r,sessions s,day_of_weeks dw,classes c ,day_of_class dc
        //WHERE 1=1
        //and c.room_id = r.id
        //and c.session_id = s.id
        //and dc.day_of_week_id = dw.id
        //and c.room_id = '1'
        //and dc.day_of_week_id IN (1,2,3)
        //and c.start_date BETWEEN '2024-09-01' AND '2024-09-23'
        //and end_date BETWEEN '2024-09-03' AND '2024-09-29'
    }

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

    public function update($id, $data)
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
