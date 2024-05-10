<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    public $timestamps = false;

    protected $hidden = ["created_at", "updated_at"];

    protected $fillable = ['id','post_name'];

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
