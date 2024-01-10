<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Routing extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $fillable = [
        'mode',
        'vessel',
        'voyage',
        'carrier',
        'load_port',
        'discharge_port',
        'etd',
        'eta',
        'notes',
    ];

    protected $casts = [
        'etd'    => 'datetime',
        'eta'    => 'datetime',
    ];

    public function scopeSearch($query, $value): void
    {
        $query->where('vessel', 'like', "%{$value}%")
            ->orWhere('voyage', 'like', "%{$value}%")
            ->orWhere('carrier', 'like', "%{$value}%");
    }
}
