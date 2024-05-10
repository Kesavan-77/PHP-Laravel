<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $table = 'marks';

    public $timestamps = false;

    protected $hidden = ["created_at", "updated_at"];

    protected $fillable = ['id','student_id','marks'];

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }
}
