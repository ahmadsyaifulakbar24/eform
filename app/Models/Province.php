<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'provinces';
    protected $fillable = [
        'province'
    ];

    public $timestamps = false;

    public function business_form_many()
    {
        return $this->hasMany(BusinessForm::class, 'province_id');
    }
    public function business_form()
    {
        return $this->hasManyThrough(
            Product::class,
            BusinessForm::class,
            'province_id',
            'business_form_id',
            'id',
            'id'
        );
    }
}
