<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{

    // Tugas 2
    public function divisi(Request $request){
        if ($request->name) {
            $divisi_pagination = Divisi::select('id', 'name')
                ->where('name', 'like', '%' . $request->name . '%')
                ->paginate(3);
        } else {
            $divisi_pagination = Divisi::select('id', 'name')->paginate(3);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'successfuly get division',
            'data' => [
                'divisions' => $divisi_pagination->items(),
            ],
            'pagination' => [
                'current_page' => $divisi_pagination->currentPage(),
                'last_page' => $divisi_pagination->lastPage(),
                'per_page' => $divisi_pagination->perPage(),
                'total' => $divisi_pagination->total(),
                'next_page_url' => $divisi_pagination->nextPageUrl(), // URL untuk halaman berikutnya
                'prev_page_url' => $divisi_pagination->previousPageUrl(),
            ]
        ], 200);
    }
}
