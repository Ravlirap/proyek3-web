<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScanSession extends Model
{
    /**
     * Kolom yang dapat diisi secara mass-assignment.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'image_path',
        'total_calories',
        'total_protein',
        'total_carbs',
        'total_fat',
    ];

    /**
     * Cast kolom numerik agar selalu dikembalikan sebagai float.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'total_calories' => 'float',
        'total_protein'  => 'float',
        'total_carbs'    => 'float',
        'total_fat'      => 'float',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Pemilik sesi scan ini (nullable → guest scan diperbolehkan).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Semua makanan yang terdeteksi AI dalam sesi ini.
     * ScanSession HAS MANY ScanFood.
     */
    public function scanFoods(): HasMany
    {
        return $this->hasMany(ScanFood::class);
    }
}
