<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $guarded = [];
    /**
     * @var int|mixed|string|null
     */

    /**
     * @var mixed
     */

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likedBy(User $user){
        return $this->likes->contains('user_id',$user->id);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    use HasFactory;
}
