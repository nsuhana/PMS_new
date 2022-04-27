<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project_card extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'project_id',
        'tajuk_besar',
        'content',
        'publish'
    ];

    public function card_view() {
        return $this->hasOne(card_view::class, 'card_id');      
    }

    public function project()
    {
        return $this->belongsTo(project::class);
    }

    // factory
    public function cardView() {
        return $this->hasOne(card_view::class, 'card_id');      
    }
}
