<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;

    protected $fillable = ['slider_title', 'slider_description', 'slider_button_text', 'slider_image', 'slider_button_url'];
}
