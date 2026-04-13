<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MealLog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WeeklyMonitoringController extends Controller
{
    public function index(Request $request)
    {
        $validated = $request->validate([
            'start_date' => ['nullable', 'date'],
        ]);

        $start = isset($validated['start_date'])
            ? Carbon::parse($validated['start_date'])->startOfDay()
            : now()->startOfWeek()->startOfDay();

        $end = $start->copy()->addDays(6)->endOfDay();

        $rows = MealLog::query()
            ->join('foods', 'foods.id', '=', 'meal_logs.food_id')
            ->where('meal_logs.user_id', $request->user()->id)
            ->whereBetween('meal_logs.logged_date', [
                $start->toDateString(),
                $end->toDateString(),
            ])
            ->groupBy('meal_logs.logged_date')
            ->orderBy('meal_logs.logged_date')
            ->get([
                DB::raw('meal_logs.logged_date as date'),
                DB::raw('ROUND(SUM(foods.calories * meal_logs.portion_multiplier), 2) as calories'),
                DB::raw('ROUND(SUM(foods.protein * meal_logs.portion_multiplier), 2) as protein'),
                DB::raw('ROUND(SUM(foods.carbs * meal_logs.portion_multiplier), 2) as carbs'),
                DB::raw('ROUND(SUM(foods.fat * meal_logs.portion_multiplier), 2) as fat'),
            ])
            ->keyBy('date');

        $daily = collect(range(0, 6))->map(function ($i) use ($start, $rows) {
            $date = $start->copy()->addDays($i)->toDateString();
            $row = $rows->get($date);

            return [
                'date' => $date,
                'calories' => (float) ($row->calories ?? 0),
                'protein' => (float) ($row->protein ?? 0),
                'carbs' => (float) ($row->carbs ?? 0),
                'fat' => (float) ($row->fat ?? 0),
            ];
        });

        return response()->json([
            'start_date' => $start->toDateString(),
            'end_date' => $end->toDateString(),
            'daily' => $daily,
            'weekly_totals' => [
                'calories' => $daily->sum('calories'),
                'protein' => $daily->sum('protein'),
                'carbs' => $daily->sum('carbs'),
                'fat' => $daily->sum('fat'),
            ],
        ]);
    }
}