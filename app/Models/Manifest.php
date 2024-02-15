<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipment extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'manifest_number',
        'manifest_date',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

     public function shipment(): BelongsTo
    {
        return $this->belongsTo(Shipment::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('manifest_number', 'like', "%{$value}%")
            ->orWhere('manifest_date', 'like', "%{$value}%");
    }
}
