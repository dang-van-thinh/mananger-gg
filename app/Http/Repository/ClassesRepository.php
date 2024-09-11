<?php

namespace App\Http\Repository;

use App\Models\Classes;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClassesRepository
{
    public function create($dataClasses)
    {
        try {
            DB::transaction(function () use ($dataClasses) {
                $query = Classes::query()->create($dataClasses->all());
                $query->dayOfClass()->attach($dataClasses->day_of_week_id);
            });
            return true;
        } catch (\Throwable $th) {
            Log::error(__CLASS__ . '@' . __FUNCTION__ . $th->getMessage());
            return false;
        }
    }

    public function all()
    {
        return Classes::with(['session', 'room', 'dayOfClass', 'teacher', 'course'])->latest('id')->paginate(10);
    }

    public function edit($id)
    {
        return Classes::with(['session', 'room', 'dayOfClass', 'teacher', 'course'])
            ->findOrFail($id);
    }

    public function update($id, $data, $request)
    {
        try {
            $classes = $this->edit($id);
            DB::transaction(function () use ($classes, $data, $request) {
                $classes->dayOfClass()->sync($request->day_of_week_id);
                $classes->update($data);
            });
            return true;
        } catch (\Throwable $th) {
            Log::error(__CLASS__ . '@' . __FUNCTION__ . $th->getMessage());
            return false;
        }
    }

    public function delete($id)
    {
        try {
            DB::transaction(function () use ($id) {
                $class = Classes::findOrFail($id);
                $class->dayOfClass()->sync([]);
                return $class->delete();
            });
            return true;
        } catch (\Throwable $th) {
            Log::error(__CLASS__ . '@' . __FUNCTION__ . $th->getMessage());
            return false;
        }
    }
}
