<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mark;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['id','name','class'];

    public function mark(){
        return $this->hasOne(Mark::class);
    }
}
