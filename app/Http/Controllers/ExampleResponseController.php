<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ExampleResponseController extends Controller
{
    public function txt()
    {
        $contents = '{hola:123}';
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'text/plain');
        return $response;
    }

    public function html()
    {
        $contents = '{hola:123}';
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'text/html');
        return $response;
    }

    public function json()
    {
        $contents = '{hola:123}';
        $response = Response::make($contents, 200);
        $response->header('Content-Type', 'text/json');
        return $response;
    }
}
