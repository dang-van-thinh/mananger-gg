<?php

namespace App\Http\Repository;

use App\Models\Expense;

class ExpenseRepository
{

    public function all()
    {
        return Expense::latest('id')->paginate(10);
    }

    public function find($id)
    {
        return Expense::find($id);
    }

    public function store(array $data)
    {
        return Expense::create($data);
    }

    public function update(array $data, $id)
    {
        $expense = Expense::find($id);
        $expense->update($data);
        return $expense;
    }

    public function delete($id)
    {
        $expense = Expense::find($id);
        $expense->delete();
        return true;
    }
}
