<?php

namespace App\Http\Service;

use App\Http\Repository\UserRepository;
use App\Http\Requests\user\StoreUserRequest;
use App\Http\Requests\user\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function getAll()
    {
        // dd($this->userRepository->index());
        return $this->userRepository->index();
    }

    public function getById($id)
    {
        return $this->userRepository->find($id);
    }
    public function store(StoreUserRequest $request)
    {
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('users', $request->file('image'));
        }

        return $this->userRepository->store($data);
    }

    public function update($id, UpdateUserRequest $request)
    {
        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = Storage::put('users', $request->file('image'));
        }
       
        return $this->userRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
