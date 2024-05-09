<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = ['id','post_id','comments'];

    public function posts(){
        return $this->belongsTo(Post::class,'post_id');
    }
}
