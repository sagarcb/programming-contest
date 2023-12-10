<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'banner', 'description', 'active_status'];

    public function teamInfos() {
        return $this->hasMany(TeamInfo::class);
    }
}
