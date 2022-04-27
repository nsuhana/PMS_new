<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class sub_kumpulan_fasa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'kumpulan_fasa_id',
        'tajuk_kumpulan',
        'tarikh_mula_rancang',
        'tarikh_tamat_rancang',
        'tarikh_mula_sebenar',
        'tarikh_tamat_sebenar',
        'peratus_rancang',
        'peratus_sebenar',
        'status',
        'catatan',
    ];

    public function kumpulan_fasa()
    {
        return $this->belongsTo(kumpulan_fasa::class);
    }
    
}
