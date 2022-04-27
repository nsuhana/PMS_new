<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class status_kemajuan_kewangan_projek extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'tahun',
        'bulan',
        'nilai_kontrak',
        'jadual_tuntutan',
        'telah_dituntut',
        'belum_dituntut',
        'telah_dibayar',
        'belum_dibayar',
        'tarikh',
    ];

    public function project()
    {
        return $this->belongsTo(project::class);
    }
    
}
