<?php

namespace App\Models;

use App\Enums\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Shipments extends Model
{
    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'hbl_number',
        'consignor',
        'consignee',
        'handling_instructions',
        'weight',
        'volume',
        'packages',

    ];

     public function route(): BelongsTo
    {
        return $this->belongsTo(Routing::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(Containers::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('hbl_number', 'like', "%{$value}%")
            ->orWhere('consignor', 'like', "%{$value}%")
            ->orWhere('consignee', 'like', "%{$value}%");
    }
}
