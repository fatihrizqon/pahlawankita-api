<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => "Index of Apps"
        ], 200);
    }
}
