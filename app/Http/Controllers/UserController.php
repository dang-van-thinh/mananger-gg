<?php

namespace App\Http\Controllers;

use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use App\Http\Service\RoleService;
use App\Http\Service\UserService;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userService;
    protected $roleService;
    public function __construct(UserService $userService, RoleService $roleService)
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }
    public function index()
    {
        $data = $this->userService->getAll();
        return view('page.user.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->roleService->getAll();
        // dd($data);
        return view('page.user.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        if ($this->userService->store($request)) {
            return redirect()->route('user.index')->with('success', 'Thêm mới vai trò thành công');
        } else {
            return back()->with('error', 'Thêm mới vai trò thất bại');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userService->getById($id);
        $role = $this->roleService->getAll();

        return view('page.user.update', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        if ($this->userService->update($id, $request)) {
            return redirect()->route('user.index')->with('success', 'Cập nhật người dùng thành công');
        } else {
            return back()->with('error', 'Cập nhật vai trò thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->delete($id);

        return back()->with('success', 'Xóa người dùng thành công');
    }
    public function status($id)
    {
        if ($this->userService->status($id)) {
            return redirect()->back()->with('success', 'chuyển đổi trạng thái người dùng thành công');
        }else{
            return back()->with('error', 'Chuyển đổi trạng thái người dùng thất bại');
        }

    }
}
