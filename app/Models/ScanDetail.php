<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ScanDetail extends Model
{
    protected $fillable = [
        'scan_session_id',
        'food_id',
        'jumlah_gram',
        'total_kalori',
    ];

    protected $casts = [
        'jumlah_gram'  => 'float',
        'total_kalori' => 'float',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    /** Sesi scan induk detail ini. */
    public function scanSession(): BelongsTo
    {
        return $this->belongsTo(ScanSession::class);
    }

    /** Data makanan yang terkait. */
    public function food(): BelongsTo
    {
        return $this->belongsTo(Food::class);
    }
}
