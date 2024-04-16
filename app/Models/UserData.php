<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;

    protected $fillable = ['country', 'gender', 'relationship', 'interested_in', 'profile_views', 'videos_watched', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
