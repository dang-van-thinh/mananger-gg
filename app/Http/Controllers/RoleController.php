<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Service\RoleService;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $roleService;
    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    public function index()
    {
        // $data = Role::latest('id')->paginate(2);
        $data = $this->roleService->getAll();
        return view('page.role.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        // $data = $request->validated();
        // Role::create($data);
        $this->roleService->create($request->validated());

        return redirect()->route('role.index')->with('success', 'Thêm mới vai trò thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = $this->roleService->getById($id);
  
        return view('page.role.update', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, $id)
    {
        $this->roleService->update($id, $request->validated());

        return redirect()->route('role.index')->with('success', 'Cập nhật vai trò thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // $role->delete();
        $this->roleService->delete($id);

        return back()->with('success', 'Xóa vai trò thành công');
    }
}
