<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // add roles relationship to the user model:
    public function role() {
        return $this->hasOne(role::class, 'user_id');
    }

    public function profile() {
        return $this->hasOne(profile::class, 'user_id');      
    }
    
    public function user_project() {
        return $this->hasMany(user_project::class, 'user_id');
    }

    public function bookmark() {
        return $this->hasMany(bookmark::class, 'user_id');
    }

    public function editor_comment() {
        return $this->hasMany(editor_comment::class, 'user_id');
    }

    public function log_activity() {
        return $this->hasMany(log_activity::class, 'user_id');
    }

    // ======================================== //

    public function isAdministrator() {
        return $this->role()->where('superuser', '1')->exists() or $this->role()->where('admin', '1')->exists();
    }

    public function isAdmin() {
        return $this->role()->where('admin', '1')->exists();
    }

    public function isSuperUser() {
        return $this->role()->where('superuser', '1')->exists();
    }

    public function isAktif() {
        return $this->where('status', '1')->exists();
    }

    public function isStaff() {
        return $this->role()->where('staffuser', '1')->exists();
    }

    public function isNotSuperUser() {
        return $this->role()->where('superuser', '0')->exists();
    }

    public function isNormalUser() {
        return $this->role()->where('superuser', '0')->where('admin', '0')->where('staffuser', '0')->exists();
    }

    public function isNotNormalUser() {
        return $this->role()->where('superuser', '1')->exists() or $this->role()->where('admin', '1')->exists() or $this->role()->where('staffuser', '1')->exists();
    }

    //factory
    public function userProject() {
        return $this->hasMany(user_project::class, 'user_id');
    }
}
