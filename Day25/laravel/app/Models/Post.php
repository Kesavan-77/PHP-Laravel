<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['id', 'post_name', 'user_name'];

    public function like(){
        return $this->hasOne(\App\Models\Like::class);
    }

    public function comments(){
        return $this->hasMany(\App\Models\Comment::class);
    }
}
