<?php

namespace App\Http\Service;

use App\Http\Repository\ExpenseRepository;
use App\Http\Requests\expense\StoreExpenseRequest;
use App\Http\Requests\expense\UpdateExpenseRequest;

class ExpenseService
{
    protected $expenseRepository;

    public function __construct(ExpenseRepository $expenseRepository)
    {
        $this->expenseRepository = $expenseRepository;
    }
    public function getAll()
    {
        return $this->expenseRepository->all();
    }
    public function getById($id)
    {
        return $this->expenseRepository->find($id);
    }
    public function store(StoreExpenseRequest $request)
    {
        $data = $request->validated();
        return $this->expenseRepository->store($data);
    }
    public function update(UpdateExpenseRequest $request, $id)
    {
        $data = $request->validated();
        return $this->expenseRepository->update($data, $id);
    }
    public function delete($id) {
        return $this->expenseRepository->delete($id);
    }
}
