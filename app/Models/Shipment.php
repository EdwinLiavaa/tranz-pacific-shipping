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
        'hbl_number',
        'consignor',
        'consignee',
        'weight',
        'volume',
        'packages',
        'handling_instructions',

    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

     public function container(): BelongsTo
    {
        return $this->belongsTo(Container::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('hbl_number', 'like', "%{$value}%")
            ->orWhere('consignor', 'like', "%{$value}%")
            ->orWhere('consignee', 'like', "%{$value}%");
    }
}
