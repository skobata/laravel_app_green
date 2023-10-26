<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HelloController extends Controller
{
    public function index(Request $request): View
    {
        $msg = $request->msg ?: 'This Message Is Sample';

        $data = [
            'msg' => $msg,
        ];

        return view('hello.index', $data);
    }

    public function other(): RedirectResponse
    {
        return redirect()->route('hello', ['msg' => 'this is other msg']);
    }
}
