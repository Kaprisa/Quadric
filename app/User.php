<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar'
    ];

    protected $with = ['roles'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'points'
    ];

    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class)->withPivot(['attempts', 'correct']);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role)
    {
        return $this->roles()->pluck('name')->contains($role);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getPointsAttribute()
    {
        return $this->questions()->withPivot(['correct'])->where('correct', true)->sum('points');
    }

}
