<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberInfo extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'image', 'tshirt_size', 'team_info_id'];

    public function team() {
        return $this->belongsTo(TeamInfo::class);
    }
}
