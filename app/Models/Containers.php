<?php

namespace App\Models;

use App\Enums\TaxType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Containers extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $fillable = [
        'container_number',
        'seal_number',
        'tare_weight',
        'gross_weight',
        'volume',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('container_number', 'like', "%{$value}%")
            ->orWhere('seal_number', 'like', "%{$value}%");
    }
}
