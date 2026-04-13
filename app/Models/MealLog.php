<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MealLog extends Model
{
    protected $fillable = [
        'user_id',
        'food_id',
        'meal_type',
        'portion_multiplier',
        'logged_date',
        'logged_time',
        'notes',
    ];

    protected $casts = [
        'logged_date' => 'date',
        'portion_multiplier' => 'float',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
