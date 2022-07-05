<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'password', 'saldo'];

    public function withdraw_history(){
        return $this->hasMany(WithdrawHistory::class, 'student_id');
    }
}
