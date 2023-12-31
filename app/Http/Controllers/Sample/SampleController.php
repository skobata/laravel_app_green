<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SampleController extends Controller
{
    //
    public function index(): View
    {
        $data = [
            'msg' => config('sample.message'),
            'data' => config('sample.data')
        ];

        return view('hello.index', $data);
    }

    public function other(): View
    {
        $data = [
            'msg' => 'SAMPLE CONTROLLER OTHER!'
        ];

        return view('hello.index', $data);
    }
}
