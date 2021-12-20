<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'image',
        'video',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getGetTitleAttribute()
    {
        return substr($this->title, 0,62);
    }

    public function getGetImageAttribute()
    {
        if ($this->image) {
            return url("storage/$this->image");
        }
    }

    public function getGetVideoAttribute()
    {
        if ($this->video) {
            return url("storage/$this->video");
        }
    }
}
