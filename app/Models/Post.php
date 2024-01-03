<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'message',
        'cover_image',
    ];

    use HasFactory;

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function votes()
{
    return $this->hasMany(Vote::class);
}

public function upvotes()
{
    return $this->votes()->where('vote', 1);
}

public function downvotes()
{
    return $this->votes()->where('vote', -1);
}
}
