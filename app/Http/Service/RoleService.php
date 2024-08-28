<?php

namespace App\Http\Service;

use App\Http\Repository\RoleRepository;
use App\Http\Requests\role\StoreRoleRequest;
use App\Http\Requests\role\UpdateRoleRequest;

class RoleService
{
    protected $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
    public function getAll()
    {
        return $this->roleRepository->all();
    }

    public function getById($id)
    {
        return $this->roleRepository->find($id);
    }
    public function create(StoreRoleRequest $requsst)
    {
        $data = $requsst->validated();
        return $this->roleRepository->create($data);
    }

    public function update($id, UpdateRoleRequest $requsst)
    {
        $data = $requsst->validated();
        return $this->roleRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->roleRepository->delete($id);
    }



}
