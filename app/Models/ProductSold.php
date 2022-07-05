<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSold extends Model
{
    use HasFactory;

    protected $table = 'product_sold';

    protected $fillable = ['product_id', 'buyer_id'];
}
