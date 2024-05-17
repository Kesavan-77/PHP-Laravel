<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['id', 'post_id', 'comment_message'];

    public function post(){
        return $this->belongsTo(\App\Models\Post::class, 'post_id');
    }
}
