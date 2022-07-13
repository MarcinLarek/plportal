<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'source',
        'postcontent',
        'category',
        'image',
        'reads',

    ];
    public function getRouteKeyName()
   {
       return 'title'; // db column name you would like to appear in the url.
   }

   public function category() {
      return $this->hasMany(PostCategories::class);
   }

   public function section() {
      return $this->belongsTo(Section::class);
   }
}
