<?php

namespace App\Http\Service;

use App\Http\Repository\SessionReponsitory;
use App\Http\Requests\session\CreateSessionRequest;
use App\Http\Requests\session\UpdateSessionRequest;

class SessionService
{
    protected $sessionRepository;

    public function __construct(SessionReponsitory $sessionRepository)
    {
        $this->sessionRepository = $sessionRepository;
    }
    public function getAll()
    {
        $listSession = $this->sessionRepository->getAll();
        return view('page.session.list', compact('listSession'));
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