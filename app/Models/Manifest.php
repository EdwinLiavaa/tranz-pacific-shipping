<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manifest extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'manifest_number',
        'manifest_date',
        'departure_cfs',
    ];

     public function route(): BelongsTo
    {
        return $this->belongsTo(Shipments::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Agents::class);
        return $this->hasMany(Containers::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('manifest_number', 'like', "%{$value}%");
    }
}
