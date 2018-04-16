<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $fillable = [
       'block_id',
       'active',
       'name',
       'resourses',
       'sort',
       'text',
       'video'
    ];

    protected $with = ['questions'];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getResoursesAttribute($val)
    {
        return json_decode($val);
    }
}
