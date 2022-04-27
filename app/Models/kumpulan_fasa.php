<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class kumpulan_fasa extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'fasa_projek_id',
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

    public function status_kemajuan_kerja_projek()
    {
        return $this->belongsTo(status_kemajuan_kerja_projek::class);
    }

    public function sub_kumpulan_fasa() {
        return $this->hasMany(sub_kumpulan_fasa::class, 'kumpulan_fasa_id');
    }
}
