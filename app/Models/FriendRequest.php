<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    use HasFactory;

    protected $table = 'friend_request';

    public function sender() {
        return $this->belongsTo(User::class);
    }

    public function recipient() {
        return $this->belongsTo(User::class);
    }
}
