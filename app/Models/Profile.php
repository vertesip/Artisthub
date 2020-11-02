<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        return '/storage/pictures/'. ($this->profileimage) ? $this->profileimage:'fgSaqkwvFqjdyqac33xMCCXpWOSGRzI9jQPDVt5K.png';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
