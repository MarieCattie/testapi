<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        // Пример массива товаров
        $products = [
            ['title' => 'apple', 'color' => 'red'],
            ['title' => 'banana', 'color' => 'yellow'],
            ['title' => 'grape', 'color' => 'purple'],
        ];
        if ($request->header('Accept') !== '*/*' || $request->header('Connection') !== 'keep-alive') {
            return response()->json(['message' => 'Invalid headers'], 400);
        }

        return response()->json($products, 200);
    }
}
