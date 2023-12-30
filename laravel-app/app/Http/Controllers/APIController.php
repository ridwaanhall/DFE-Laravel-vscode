<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Story;

class APIController extends Controller
{
    //
    public function storysearch(Request $request)
    {
        $search = $request->input('search');
        $data = Story::where('title', 'like', '%' . $search . '%')->get();
        
        if ($data->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No data found',
                'data' => $data
            ], 404);
        }

        else {
            return response()->json([
                'success' => true,
                'message' => 'Data found',
                'data' => $data
            ], 200);
        }
    }
}
