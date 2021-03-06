<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class vendor_profile extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'vendor_id',
        'vendor_avatar',
        'no_pendaftaran_syarikat',  
        'maklumat_bank',    
        'no_akaun_kewangan',    
        'kelas',    
        'bidang',   
        'telefon',
        'faks',
        'alamat',
        'website',
    ];

    public function vendor()
    {
        return $this->belongsTo(vendor::class);
    }
}
