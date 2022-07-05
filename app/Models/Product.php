<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'description', 'price', 'sold', 'student_id'];

    public function seller(){
        return $this->belongsTo(Student::class, 'student_id');
    }
}
