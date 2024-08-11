<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    // Tugas 2
    public function divisi(Request $request){

        if($request->name){
            $divisi = Divisi::select('id', 'name')
            ->where('name', 'like', '%'. $request->name.'%')
            ->first();
            $divisi_pagination = Divisi::select('id', 'name')->paginate(3);
        }

        if($request->name == null){
            $divisi = Divisi::select('id', 'name')->get();
            $divisi_pagination = Divisi::select('id', 'name')->paginate(3);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'successfuly get division',
            'data' => [
                'divisions' => $divisi,
            ],
            'pagination' => [
                'current_page' => $divisi_pagination->currentPage(),
                'last_page' => $divisi_pagination->lastPage(),
                'per_page' => $divisi_pagination->perPage(),
                'total' => $divisi_pagination->total(),
            ]
        ], 200);
    }
}
