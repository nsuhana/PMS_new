<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vendor extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nama_pembekal_dilantik',
        'description',
        'status',
    ];

    public function project() {
        return $this->hasMany(project::class, 'vendor_id');
    }

    public function vendor_profile() {
        return $this->hasOne(vendor_profile::class, 'vendor_id');
    }

    //factory
    public function vendorProfile() {
        return $this->hasOne(vendor_profile::class, 'vendor_id');
    }
}
