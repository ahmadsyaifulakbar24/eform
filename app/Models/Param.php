<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Param extends Model
{
    use Uuids, HasFactory;

    protected $table = 'params';
    protected $fillable = [
        'parent_id',
        'category',
        'param',
        'alias',
        'order'
    ];

    public $timestamps = false;

    public function business_form_many_business_type()
    {
        return $this->hasMany(BusinessForm::class, 'business_type_id');
    }

    public function business_form_through_business_type()
    {
        return $this->hasManyThrough(
            Product::class,
            BusinessForm::class,
            'business_type_id',
            'business_form_id',
            'id',
            'id'
        );
    }

    public function business_form_many_business_fields()
    {
        return $this->hasMany(BusinessForm::class, 'business_fields_id');
    }

    public function business_form_through_business_fields()
    {
        return $this->hasManyThrough(
            Product::class,
            BusinessForm::class,
            'business_fields_id',
            'business_form_id',
            'id',
            'id'
        );
    }

    public function business_form_many_industry()
    {
        return $this->hasMany(BusinessForm::class, 'industry_id');
    }

    public function business_form_through_industry()
    {
        return $this->hasManyThrough(
            Product::class,
            BusinessForm::class,
            'industry_id',
            'business_form_id',
            'id',
            'id'
        );
    }

    public function business_form_many_annual_turnover()
    {
        return $this->hasMany(BusinessForm::class, 'annual_turnover', 'param');
    }

    public function business_form_through_annual_turnover()
    {
        return $this->hasManyThrough(
            Product::class,
            BusinessForm::class,
            'annual_turnover',
            'business_form_id',
            'param',
            'id'
        );
    }
}
