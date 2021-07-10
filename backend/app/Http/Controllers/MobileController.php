<?php

namespace App\Http\Controllers;

use App\Models\Mobile;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function index()
    {
        $mobile = Mobile::all();

        return response()->json($mobile);
    }
}
