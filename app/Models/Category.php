<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function section() {
      return $this->belongsTo(Section::class);
    }

    public function posts() {
      return $this->hasMany(PostCategories::class);
    }
}
