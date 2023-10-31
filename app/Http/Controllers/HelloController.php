<?php

namespace App\Http\Controllers;

use App\MyClasses\MyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Person;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use function Symfony\Component\HttpKernel\Log\format;

class HelloController extends Controller
{
    public function __construct(MyService $myService)
    {
        $myService = app('App\MyClasses\MyService');
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(MyService $myService, int $id = -1): View
    {
        $myService->setId($id);
        $data = [
            'msg' => $myService->say(),
            'data' => $myService->allData(),
        ];
        return view('hello.index', $data);
    }

    public function other(): RedirectResponse
    {
        $data = [
            'name' => 'taro',
            'mail' => 'taro@yamada',
            'tel' => '090-999-999'
        ];
        $query_str = http_build_query($data);
        $data['msg'] = $query_str;
        return \redirect()->route('hello.index', $data);
    }
}
