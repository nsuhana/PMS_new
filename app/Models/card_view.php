<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class card_view extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'card_id',
        'staff',
        'editor',
        'normal_user',
        'guest',
    ];

    public function project_card()
    {
        return $this->belongsTo(project_card::class);
    }

    // factory

    public function projectCard()
    {
        return $this->belongsTo(project_card::class);
    }

}
