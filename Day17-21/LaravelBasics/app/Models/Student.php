<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";

    protected $fillable = ['name','class','address','isAdult'];

    protected $casts = ['isAdult'=>'string'];

    protected $hidden = ['created_at','updated_at'];

    protected $appends = ['name_address'];

    public function getNameAddressAttribute(){
        return $this->name.' - '.$this->class;
    }

    public function getAddressAttribute(){
        return ucfirst($this->attributes['address']);
    }

    public function setClassAttribute($value){
        $this->attributes['class'] = strtoupper($value);
    }
}