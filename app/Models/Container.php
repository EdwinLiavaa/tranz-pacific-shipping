<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Container extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'container_number',
        'container_type',
        'seal_number',
        'tare_weight',
        'gross_weight',
        'volume',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

     public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('container_number', 'like', "%{$value}%")
            ->orWhere('container_type', 'like', "%{$value}%");
    }
}
