<?php

namespace App\Http\Service;

use App\Http\Repository\SessionReponsitory;
use App\Http\Requests\session\CreateSessionRequest;
use App\Http\Requests\session\UpdateSessionRequest;
use Illuminate\Http\Request;

class SessionService
{
    protected $sessionRepository;

    public function __construct(SessionReponsitory $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }

    public function alls()
    {
        return $this->sessionRepository->alls();
    }

    //getSessionsByRoomAndDateRangeAndDays
    public function getSessionByRoomAndStartDateAndEndDateAndDayOfWeeks(Request $request)
    {

        $room = $request->input("roomId");
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');
        $dayOfWeeks = $request->input('dayOfWeek');
        
        return $this->sessionRepository->getSessionByRoomAndStartDateAndEndDateAndDayOfWeeks($room, $startDate, $endDate, $dayOfWeeks);
    }

    public function getAll()
    {
        return $this->sessionRepository->getAll();
    }

    public function find($id)
    {
        return $this->sessionRepository->find($id);
    }
    public function create(CreateSessionRequest $request)
{
    $data = [
        'name' => $request->name,
        'start_time' => $request->start_time,
        'end_time' => $request->end_time,
    ];

    return $this->sessionRepository->create($data);
}

    public function update( UpdateSessionRequest $request, $id)
    {
        $data = [
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,

        ];
        return $this->sessionRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->sessionRepository->delete($id);
    }



}
