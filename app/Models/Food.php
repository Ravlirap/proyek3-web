<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Food extends Model
{
    protected $fillable = [
        'name',
        'calories',
        'protein',
        'carbs',
        'fat',
        'default_portion_grams',
    ];

    public function mealLogs(): HasMany
    {
        return $this->hasMany(MealLog::class);
    }
}
