<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class status_kemajuan_kerja_projek extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'fasa_projek',
    ];

    public function project()
    {
        return $this->belongsTo(project::class);
    }

    public function kumpulan_fasa() {
        return $this->hasMany(kumpulan_fasa::class, 'fasa_projek_id');
    }
}
