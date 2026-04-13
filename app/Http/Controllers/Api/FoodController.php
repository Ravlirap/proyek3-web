<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Food;

class FoodController extends Controller
{
    public function index()
    {
        return response()->json(
            Food::query()->orderBy('name')->get()
        );
    }
}
