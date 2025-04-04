<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'price_per_hour',
        'location',
        'sport_type'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_type', 'title');
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

}
