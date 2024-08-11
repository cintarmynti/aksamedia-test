<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{

    //Tugas 3
    public function employee(Request $request)
    {
        $name = $request->name;
        $division_id = $request->division_id;

        $query = Employee::with('divisi:id,name');

        if ($name) {
            $query->where('name', 'like', '%' . $name . '%');
        }

        if ($division_id) {
            $query->whereHas('divisi', function ($query) use ($division_id) {
                $query->where('id', 'like', '%' . $division_id . '%');
            });
        }

        $employees = $query->get();

        $formatEmployee = $employees->map(function ($employee) {
            return [
                'id' => $employee->id,
                'image' => $employee->image,
                'name' => $employee->name,
                'phone' => $employee->phone,
                'division' => [
                    'id' => $employee->divisi->id,
                    'name' => $employee->divisi->name,
                ],
                'position' => $employee->position,
            ];
        });

        return response()->json([
            'status' => 'Success',
            'message' => "Successfully get employee",
            'data' => [
                'employees' => $formatEmployee
            ]
        ]);
    }

}
