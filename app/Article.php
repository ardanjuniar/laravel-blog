<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'table_articles';
    protected $guarded = [];

    public function categori()
    {
        return $this->belongsTo(Categori::class, 'categories_id', 'id');
    }

    public function getRouteKeyName()
    {
        return 'judul';
    }
}
