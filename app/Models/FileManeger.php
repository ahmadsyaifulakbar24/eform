<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileManeger extends Model
{
    use Uuids, HasFactory;

    protected $table = 'file_manegers';
    protected $fillable = [
        'business_form_id',
        'path',
        'file_name',
        'type'
    ];

    protected $appends = [
        'path_url'
    ];
    
    public function getPathUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['path']);
    }

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
}
