<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MealLog;
use Illuminate\Http\Request;

class MealLogController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'date' => ['nullable', 'date'],
        ]);

        $date = $validated['date'] ?? now()->toDateString();

        $logs = MealLog::query()
            ->with('food:id,name,calories,protein,carbs,fat')
            ->where('user_id', $request->user()->id)
            ->whereDate('logged_date', $date)
            ->latest()
            ->get();

        $totals = [
            'calories' => $logs->sum(fn ($log) => $log->food->calories * $log->portion_multiplier),
            'protein'  => $logs->sum(fn ($log) => $log->food->protein * $log->portion_multiplier),
            'carbs'    => $logs->sum(fn ($log) => $log->food->carbs * $log->portion_multiplier),
            'fat'      => $logs->sum(fn ($log) => $log->food->fat * $log->portion_multiplier),
        ];

        return response()->json([
            'date' => $date,
            'totals' => $totals,
            'data' => $logs,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'food_id' => ['required', 'exists:foods,id'],
            'meal_type' => ['required', 'in:breakfast,lunch,dinner,snack'],
            'portion_multiplier' => ['nullable', 'numeric', 'min:0.1'],
            'logged_date' => ['nullable', 'date'],
            'logged_time' => ['nullable'],
            'notes' => ['nullable', 'string'],
        ]);

        $mealLog = MealLog::create([
            'user_id' => $request->user()->id,
            'food_id' => $validated['food_id'],
            'meal_type' => $validated['meal_type'],
            'portion_multiplier' => $validated['portion_multiplier'] ?? 1,
            'logged_date' => $validated['logged_date'] ?? now()->toDateString(),
            'logged_time' => $validated['logged_time'] ?? now()->format('H:i:s'),
            'notes' => $validated['notes'] ?? null,
        ]);

        return response()->json([
            'message' => 'Log makanan berhasil ditambahkan',
            'data' => $mealLog->load('food'),
        ], 201);
    }
}
