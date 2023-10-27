<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HelloController extends Controller
{
    public function index(Request $request): View
    {
        $data = [
            'msg' => $request->hello,
        ];

        return view('hello.index', $data);
    }

    public function other(Request $request): View
    {
        $data = [
            'msg' => $request->bye,
        ];
        return view('hello.index', $data);
    }
}
