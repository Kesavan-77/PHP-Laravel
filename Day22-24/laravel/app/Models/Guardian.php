<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $table = 'guardians';

    protected $fillable = ['id','name','relationship','contact_number','email','status','created_at','updated_at'];

    protected $hidden = ['created_at','updated_at'];

    public function students(){
        return $this->hasOne(Student::class);
    }
}
