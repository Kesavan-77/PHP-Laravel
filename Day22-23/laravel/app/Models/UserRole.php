<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    use HasFactory;

    protected $table = 'user_roles';

    protected $fillable = ['id','user_id','role_id'];

    public $timestamps = false;

    protected $hidden = ["created_at", "updated_at"];
}
