<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class EmployeeController extends Controller
{

    //Tugas 3
    public function employee(Request $request)
    {
        try {
            $name = $request->name;
            $division_id = $request->division_id;

            $query = Employee::with('divisi:id,name');

            if ($name) {
                $query->where('name', 'like', '%'. $name. '%');
            }

            if ($division_id) {
                $query->where('division', 'like', '%' . $division_id . '%');
            }

            // $employees = $query->get();
            $employee_pagination = $query->paginate(10);

            if ($employee_pagination->isEmpty()) {
                return response()->json([
                    'status' => 'Success',
                    'message' => 'No employees found',
                    'data' => [
                        'employees' => []
                    ]
                ], 200);
            }

            $formatEmployee = $employee_pagination->map(function ($employee) {
                return [
                    'id' => $employee->id,
                    'image' => url('storage/' . $employee->image),
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
                ],
                'pagination' => [
                    'current_page' => $employee_pagination->currentPage(),
                    'last_page' => $employee_pagination->lastPage(),
                    'per_page' => $employee_pagination->perPage(),
                    'total' => $employee_pagination->total(),
                    'next_page_url' => $employee_pagination->nextPageUrl(),
                    'prev_page_url' => $employee_pagination->previousPageUrl(),
                ]
            ], 200);
        } catch (\Exception $e) {
            // Tangkap error dan return response gagal
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update employee: ' . $e->getMessage(),
            ], 500);
        }
    }

    // Tugas 4
    public function create(Request $request){
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'required|file|image',
                'name' => 'required|string|max:255',
                'phone' => 'required|string',
                'division' => 'required|string',
                'position' => 'required|string'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public');
            }

            employee::create([
                'image' => $imagePath, // Simpan path gambar yang sudah di-upload
                'name' => $request->name,
                'phone' => $request->phone,
                'division' => $request->division,
                'position' => $request->position,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee created successfully',
            ], 201);

        }catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update employee: ' . $e->getMessage(),
            ], 500);
        }
    }

    //Tugas 5
    public function update(Request $request, $id){

        // dd($request->all());
        try {
            $validator = Validator::make($request->all(), [
                'image' => 'file|image',
                'name' => 'required|string|max:255',
                'phone' => 'required|string',
                'division' => 'required|string',
                'position' => 'required|string'
            ]);

            if($validator->fails()){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Validation Error',
                    'errors' => $validator->errors()
                ], 422);
            }

            $employee = Employee::find($id);

            if($employee == null){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Employee not found',
                ], 404);
            }

            if($request->hasFile('image')){
                if ($employee->image) {
                    Storage::disk('public')->delete($employee->image);
                }
                $image = $request->file('image');
                $imagePath = $image->store('images', 'public');
            }else {
                $imagePath = $employee->image;
            }

            $employee->update([
                'image' => $imagePath,
                'name' => $request->name,
                'phone' => $request->phone,
                'division' => $request->division,
                'position' => $request->position,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Employee updated successfully',
            ], 200);

        } catch (\Exception $e) {
            // Tangkap error dan return response gagal
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update employee: ' . $e->getMessage(),
            ], 500);
        }

    }

    // Tugas 6
    public function destroy($id){
        // dd($id);

       try {

            $employee = Employee::find($id);

            if($employee == null){
                return response()->json([
                    'status' => 'error',
                    'message' => 'employee is not found'
                ]);
            }

            if($employee->image){
                Storage::disk('public')->delete($employee->image);

            }

            $employee -> delete();

            return response()->json([
                'status' => 'success',
                'message' => 'employee delete successfully'
            ]);

       } catch (\Throwable $th) {
        //throw $th;
        return response()->json([
            'status' => 'error',
            'message' => 'employee delete failed'
        ]);
       }

    }
}
