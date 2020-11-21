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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}
