<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommenConnection extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'connection_id',
    ];

  
    public function connectionUser()
    {
        return $this->hasOne(User::class, 'id', 'connection_id');
    }

  
}
