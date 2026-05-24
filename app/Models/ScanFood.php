<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScanFood extends Model
{
    /**
     * Kolom yang dapat diisi secara mass-assignment.
     *
     * @var array<string>
     */
    protected $fillable = [
        'scan_session_id',
        'food_name',
        'calories',
        'protein',
        'carbs',
        'fat',
        'estimated_portion_grams',
    ];

    /**
     * Cast kolom numerik agar selalu dikembalikan sebagai float.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'calories'                => 'float',
        'protein'                 => 'float',
        'carbs'                   => 'float',
        'fat'                     => 'float',
        'estimated_portion_grams' => 'float',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /**
     * Sesi scan induk yang memiliki item makanan ini.
     * ScanFood BELONGS TO ScanSession.
     */
    public function scanSession(): BelongsTo
    {
        return $this->belongsTo(ScanSession::class);
    }
}
