<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'friend_id',
        'status',
    ];

    const ACTIVE = 1;
    const INACTIVE = 0;

    public function user()
    {
        return $this->belongsTo(User::class, 'friend_id', 'id');
    }

    public function recivedFriend()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
  
}
