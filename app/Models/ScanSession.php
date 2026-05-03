<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ScanSession extends Model
{
    protected $fillable = [
        'user_id',
        'image_path',
        'total_kalori',
        'confidence',
    ];

    protected $casts = [
        'total_kalori' => 'float',
        'confidence'   => 'float',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /** Pemilik sesi scan ini. */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** Detail makanan yang ditemukan dalam sesi ini. */
    public function scanDetails(): HasMany
    {
        return $this->hasMany(ScanDetail::class);
    }
}
