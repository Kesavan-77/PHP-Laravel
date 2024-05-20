<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = ['id', 'post_id', 'user_name'];

    public function post(){
        return $this->belongsTo('Post');
    }
}
