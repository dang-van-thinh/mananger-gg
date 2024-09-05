<?php

namespace App\Http\Controllers;

use App\Http\Requests\room\CreateRoomRequest;
use App\Http\Requests\room\UpdateRoomRequest; 
use App\Http\Service\RoomService;

class RoomController extends Controller
{
    protected $roomService; 

    public function __construct(
        RoomService $roomService
    ){
        $this->roomService = $roomService; 
    }

    public function index()
    {
        return $this->roomService->getAll();
    }

    public function create()
    {
        return view('page.room.create');
    }

    public function store(CreateRoomRequest $request)
    { 
        if($this->roomService->create($request)){
            return redirect()->route('rooms.create')->with('success', 'Thêm phòng thành công.');
        }else{
            return back()->with('error', 'Thêm phòng thất bại.');
        }         
    }


    public function show( $id)
    {
        //
    }


    public function edit( $id)
    {
        $room = $this->roomService->find($id);
        return view('page.room.update', compact('room'));
    }

 
    public function update(UpdateRoomRequest $request,  $id)
    {
        if ($this->roomService->update($request, $id)) {
            return redirect()->route('rooms.index')->with('success', 'Sửa phòng thành công.');
        } else {
            return back()->with('error', 'Sửa phòng thất bại. Vui lòng thử lại.');
        }
    }

    public function destroy( $id)
    {
        if( $this->roomService->delete($id)){
            return redirect()->route('rooms.index')->with('success', 'Xóa phòng thành công.');
        }else{
            return back()->with('error', 'Đã xảy ra lỗi không tìm thấy phòng cần tìm.');
        }    
    }
}