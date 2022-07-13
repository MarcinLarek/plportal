<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function getRouteKeyName()
    {
       return 'category'; // db column name you would like to appear in the url.
    }
    public function section() {
      return $this->belongsTo(Section::class);
    }

    public function posts() {
      return $this->hasMany(PostCategories::class);
    }
    public function getsection() {
      $section = Section::where('id',$this->section_id)->first();
      return $section;
    }
}
