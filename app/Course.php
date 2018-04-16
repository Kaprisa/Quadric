<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    protected $fillable = [
        'name',
        'description',
        'image',
        'category_id',
        'active',
    ];

    public function blocks()
    {
        return $this->hasMany(Block::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
