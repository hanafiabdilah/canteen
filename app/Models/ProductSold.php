<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    use HasFactory;

    protected $table = 'product_sold';

    protected $fillable = ['product_id', 'buyer_id'];

    public function detail(){
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }

    public function buyer(){
        return $this->belongsTo(Student::class, 'buyer_id');
    }
}
