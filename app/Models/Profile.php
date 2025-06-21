<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Profile extends Model
{

    protected $fillable = [
        'user_id',
        'profile_picture',
        'history_reservation'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
