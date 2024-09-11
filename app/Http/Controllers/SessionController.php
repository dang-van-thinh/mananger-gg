<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\Response;
use Illuminate\Http\Request;
use App\Http\Requests\session\CreateSessionRequest;
use App\Http\Requests\session\UpdateSessionRequest;
use App\Http\Service\SessionService;
use Illuminate\Support\Facades\Http;


class SessionController extends Controller
{
    protected $sessionService;

    public function __construct(
        SessionService $sessionService
    ){
        $this->sessionService = $sessionService;
    }

    public function index()
    {
        return $this->sessionService->getAll();
    }


    public function create()
    {
        return view('page.session.create');
    }


    public function store(CreateSessionRequest $request)
    {
        if($this->sessionService->create($request)){
            return redirect()->route('sessions.create')->with('success', 'Thêm ca học thành công.');
        }else{
            return back()->with('error', 'Thêm ca học thất bại.');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $session = $this->sessionService->find($id);
        return view('page.session.update', compact('session'));
    }


    public function update(UpdateSessionRequest $request, $id)
    {
        if ($this->sessionService->update($request, $id)) {
            return redirect()->route('sessions.index')->with('success', 'Sửa ca học thành công.');
        } else {
            return back()->with('error', 'Sửa ca học thất bại. Vui lòng thử lại.');
        }
    }


    public function destroy($id)
    {
        if($this->sessionService->delete($id)){
            return redirect()->route('sessions.index')->with('success', 'Xóa ca học thành công');
        }else{
            return back()->with('error', 'Xóa ca học thất bại');
        }
    }

    public function getSessionByDateAndRoom(Request $request)
    {
       $data = $this->sessionService->getSessionByRoomAndStartDateAndEndDateAndDayOfWeeks($request);
        return response()->json([
            'message'=>'Thành công !',
            "session"=> $data
        ],200);
    }

    public function getAllSessionApi(){
        $sessions =  $this->sessionService->alls();
        return response()->json([
            'message'=>'Thành công',
            'sessions'=>$sessions
        ],200);
    }

}
