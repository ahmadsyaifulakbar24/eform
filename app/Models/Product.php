<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use Uuids, HasFactory;

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

    protected $appends = [
        'front_image_url',
        'side_image_url',
        'top_image_url',
        'back_image_url',
    ];

    public function getFrontImageUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['front_image']);
    }

    public function getSideImageUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['side_image']);
    }

    public function getTopImageUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['top_image']);
    }

    public function getBackImageUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['back_image']);
    }
}
