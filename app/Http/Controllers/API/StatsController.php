<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

class StatsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): JsonResponse
    {
        return response()->json([
            'data' => [
                'providers' => \App\Models\User::whereIsAdmin(false)->count(),
                'categories' => \App\Models\Category::query()->count(),
                'servcies' => \App\Models\Course::query()->count()
            ]
        ], 201);
    }
}
