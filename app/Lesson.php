<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{

    protected $fillable = [
       'block_id',
       'active',
       'name',
       'resources',
       'sort',
       'text',
       'video'
    ];

    protected $appends = ['totals'];

    protected $with = ['questions'];

    public function block()
    {
        return $this->belongsTo(Block::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function getResourcesAttribute($val)
    {
        return json_decode($val);
    }

    public function getTotalsAttribute()
    {
      $total = $this->questions()->sum('points');
      $user_total = $this->questions->where('correct', true)->sum('points');
      return [
        'total' => $total,
        'user_total' => $user_total
      ];
    }
}
