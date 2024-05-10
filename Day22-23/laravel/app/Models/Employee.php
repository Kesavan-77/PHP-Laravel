<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = ['id','name'];

    public $timestamps = false;

    protected $hidden = ["created_at", "updated_at"];

    public function roles(){
        return $this->hasMany(Role::class);
    }
}
