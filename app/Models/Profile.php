<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath =  ($this->profileimage) ? $this->profileimage:'pictures/FDJKjp6oOZPzZWTIvKy0NuXj2ltfvSD6eoRwgSoM.png';
        return '/storage/'.$imagePath;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
