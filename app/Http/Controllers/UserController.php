<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\user\StoreUserRequest as UserStoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest as UserUpdateUserRequest;
use App\Http\Service\RoleService;
use App\Http\Service\UserService;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $userService;
    protected $roleService;
    public function __construct(UserService $userService,RoleService $roleService )
    {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }
    public function index()
    {
        $data = $this->userService->getAll();
        // dd($data->toArray());
        return view('page.user.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = $this->userService->role();
        // dd($data);
        return view('page.user.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreUserRequest $request)
    {
        $this->userService->store($request);
        return redirect()->route('user.index')->with('success', 'Thêm mới vai trò thành công');
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
    public function update(UserUpdateUserRequest $request, string $id)
    {
        // dd($request->validated());
        $this->userService->update($id, $request);

        return redirect()->route('user.index')->with('success', 'Cập nhật người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userService->delete($id);

        return back()->with('success', 'Xóa người dùng thành công');
    }
}
