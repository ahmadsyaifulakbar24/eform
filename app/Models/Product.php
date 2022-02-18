<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable = [
        'business_form_id',
        'name',
        'description',
        'price',
        'sku',
        'front_image',
        'side_image',
        'top_image',
        'back_image'
    ];

    public $timestamps = false;
}
