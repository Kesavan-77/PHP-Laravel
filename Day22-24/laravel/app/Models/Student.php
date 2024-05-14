<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['id','name','age','grade','guardian_id','status','created_at','updated_at'];

    protected $hidden = ['created_at','updated_at'];

    public function guardians(){
        return $this->belongsTo(Guardian::class);
    }

    public function courses(){
        return $this->hasOne(Course::class);
    }
}
