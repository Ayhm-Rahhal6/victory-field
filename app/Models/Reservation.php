<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}

public function field()
{
    return $this->belongsTo(Field::class);
}
//loma

}
