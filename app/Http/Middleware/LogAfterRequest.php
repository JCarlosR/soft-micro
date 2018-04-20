<?php namespace App\Http\Middleware;

use App\HttpRequest;
use Closure;
use Illuminate\Support\Facades\Log;

class LogAfterRequest {

    public function handle($request, Closure  $next)
    {
        return $next($request);
    }

    public function terminate($request, $response)
    {
        if ($response->headers->get('Content-Type') == 'application/json') {
            $httpRequest = new HttpRequest();
            $httpRequest->request = $request->fullUrl();
            $httpRequest->response = $response->getContent();
            $httpRequest->save();
        }
    }

}