<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'vendor_id',
        'tajuk_projek',
        'pemilik_projek',
        'pengurus_projek',
        'rujukan_kontrak',
        'kos_kontrak_tidak_termasuk_caj_perkhidmatan',
        'kos_kontrak_termasuk_caj_perkhidmatan',
        'bon_pelaksanaan_projek',
        'tempoh_sah_bon',
        'tempoh_mula_kontrak',
        'tempoh_tamat_kontrak',
        'skop_projek',
        'status',
        'publish',
        'description',
        
    ];

    public function vendor()
    {
        return $this->belongsTo(vendor::class);
    }

    public function user_project() {
        return $this->hasMany(user_project::class, 'project_id');
    }

    public function status_kemajuan_kerja_projek() {
        return $this->hasMany(status_kemajuan_kerja_projek::class, 'project_id');
    }

    public function status_kemajuan_kewangan_projek() {
        return $this->hasMany(status_kemajuan_kewangan_projek::class, 'project_id');
    }

    public function project_card() {
        return $this->hasMany(project_card::class, 'project_id');
    }

    public function bookmark() {
        return $this->hasMany(bookmark::class, 'project_id');
    }

    public function editor_comment() {
        return $this->hasMany(editor_comment::class, 'project_id');
    }

    //factory
    public function userProject() {
        return $this->hasMany(user_project::class, 'project_id');
    }

    public function projectCard() {
        return $this->hasMany(project_card::class, 'project_id');
    }

}
