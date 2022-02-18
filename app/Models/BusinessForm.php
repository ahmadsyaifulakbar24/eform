<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessForm extends Model
{
    use Uuids, HasFactory;
    protected $table = 'business_forms';
    protected $fillable = [
        'company_name',
        'since',
        'business_type_id',
        'business_fields_id',
        'industry_id',
        'capital',
        'annual_turnover',
        'total_employee',
        'company_description',
        'province_id',
        'city_id',
        'address',
        'postal_code',
        'company_image',
        'contact_name',
        'phone',
        'email',
        'website',
        'business_activity_id',

        'company_npwp',
        'company_akta',
        'nib',
        'director_ktp',
        'sk_kemenkumham',
        
        'npwp',
        'ktp',
        'photo_with_ktp',

        'product_certificate',
        'product_information'
    ];
}
