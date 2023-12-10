<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamInfo extends Model
{
    use HasFactory;

    protected $fillable = ['team_name', 'university_name', 'coach_name',
        'coach_email', 'coach_mobile_number', 'coach_tshirt_size',
        'email_verified', 'verification_token', 'contest_id'
        ];

    public function members() {
        return $this->hasMany(MemberInfo::class);
    }

    public function Contest() {
        return $this->belongsTo(Contest::class);
    }
}
