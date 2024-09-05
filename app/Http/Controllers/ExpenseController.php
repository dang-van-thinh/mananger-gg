<?php

namespace App\Http\Controllers;

use App\Http\Requests\expense\StoreExpenseRequest;
use App\Http\Requests\expense\UpdateExpenseRequest;
use App\Http\Service\ExpenseService;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $expenseService;
    public function __construct(ExpenseService $expenseService)
    {
        $this->expenseService = $expenseService;
    }
    public function index()
    {
        $data = $this->expenseService->getAll();
        return view('page.expense.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('page.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        if ($this->expenseService->store($request)) {
            return back()->with('success', 'Thêm mới chi phí khác thành công');
        } else {
            return back()->with('error', 'Thêm mới chi phí khác thất bại');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return response()->json($expense);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $expense = $this->expenseService->getById($id);
        return view('page.expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, string $id)
    {
        if ($this->expenseService->update($request, $id)) {
            return redirect()->route('expense.index')->with('success', 'Cập nhật chi phí khác thành công');
        } else {
            return back()->with('error', 'Cập nhật chi phí khác thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if ($this->expenseService->delete($id)) {
            return back()->with('success', 'Xóa chi phí khác thành công');
        } else {
            return back()->with('success', 'Xóa chi phí khác thất bại');
        }
    }
}
