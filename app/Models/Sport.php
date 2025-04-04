<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sport extends Model
{

    use HasFactory;

    protected $fillable = [
       'title',
        'description_info',
        'description_rule',
        'image',
        'link_info',
        'link_rule'
    ];

    public function fields()
    {
        return $this->hasMany(Field::class, 'sport_type', 'title');
    }
    
}
