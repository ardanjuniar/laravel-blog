<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Categori extends Model
{
    protected $table = 'table_categories';
    protected $guarded = ['id'];

    public function article()
    {
        return $this->hasMany(Article::class, 'categories_id', 'id');
    }

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
