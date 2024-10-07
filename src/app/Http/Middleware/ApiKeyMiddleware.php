<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiKeyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Задайте API ключ (например, через переменные окружения .env)
        $apiKey = env('API_KEY', 'your_default_api_key');

        // Получаем API ключ из заголовка 'Authorization'
        $requestApiKey = $request->header('Authorization');

        if ($requestApiKey !== $apiKey) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
