<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['id','job'];
    
    public $timestamps = false;

    protected $hidden = ["created_at", "updated_at"];

    public function employees(){
        return $this->belongsToMany(Employee::class, 'job');
    }
    
    
}
