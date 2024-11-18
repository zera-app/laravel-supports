<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class BladeDirectiveController extends Controller
{
    /**
     * testing view for blade directive
     */
    public function index()
    {
        return view('test.blade-directive');
    }
}
