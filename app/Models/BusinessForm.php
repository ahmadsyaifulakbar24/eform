<?php

namespace App\Models;

use App\Traits\Uuids;
use Attribute;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
        'main_product',
        'capital',
        'annual_turnover',
        'total_employee',
        'company_description',
        'province_id',
        'city_id',
        'address',
        'kecamatan',
        'kelurahan',
        'postal_code',
        'company_image',
        'contact_name',
        'nik',
        'field_npwp',
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
        'product_information',

        'status_ukm',
        'account_lpse',
        'lpse_name',
        'registered_lkpp'
    ];

    protected $appends = [
        'company_image_url',
        'company_npwp_url',
        'company_akta_url',
        'nib_url',
        'director_ktp_url',
        'sk_kemenkukham_url',
        'npwp_url',
        'ktp_url',
        'photo_with_ktp_url'
    ];

    public function getCompanyImageUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['company_image']);
    }

    public function getCompanyNpwpUrlAttribute()
    {
        return !empty($this->attributes['company_npwp']) ?  url('') . Storage::url($this->attributes['company_npwp']) : null;
    }

    public function getCompanyAktaUrlAttribute()
    {
        return !empty($this->attributes['company_akta']) ? url('') . Storage::url($this->attributes['company_akta']) : null; 
    }

    public function getNibUrlAttribute()
    {
        return !empty($this->attributes['nib']) ? url('') . Storage::url($this->attributes['nib']) : null;
    }

    public function getDirectorKtpUrlAttribute()
    {
        return !empty($this->attributes['director_ktp']) ? url('') . Storage::url($this->attributes['director_ktp']) : null;
    }

    public function getSkKemenkumhamUrlAttribute()
    {
        return !empty($this->attributes['sk_kemenkumham']) ? url('') . Storage::url($this->attributes['sk_kemenkumham']) : null;
    }

    public function getNpwpUrlAttribute()
    {
        return !empty($this->attributes['npwp']) ? url('') . Storage::url($this->attributes['npwp']) : null;
    }

    public function getKtpUrlAttribute()
    {
        return !empty($this->attributes['ktp']) ? url('') . Storage::url($this->attributes['ktp']) : null;
    }

    public function getPhotoWithKtpUrlAttribute()
    {
        return !empty($this->attributes['photo_with_ktp']) ? url('') . Storage::url($this->attributes['photo_with_ktp']) : null;
    }

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function product_certificate()
    {
        return $this->hasMany(FileManeger::class, 'business_form_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'business_form_id');
    }

    public function business_type()
    {
        return $this->belongsTo(Param::class, 'business_type_id');
    }

    public function business_activity()
    {
        return $this->belongsTo(Param::class, 'business_activity_id');
    }

    public function business_fields()
    {
        return $this->belongsTo(Param::class, 'business_fields_id');
    }

    public function industry()
    {
        return $this->belongsTo(Param::class, 'industry_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function product_certificate_data()
    {
        return $this->hasMany(FileManeger::class, 'business_form_id');
    }
}
