<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flyer extends Model
{
    protected $fillable = [
        'user_id',
        'time',
        'area',
        'venue',
        'date',
    ];

    public static function locatedAt($area)
    {
        return static::where(compact('area'))->firstOrFail();
    }

    public function addPhoto(Photo $photo)
    {
        return $this->photo()->save($photo);
    }

    public function photo()
    {
        return $this->hasMany(Photo::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function ownedBy(User $user)
    {
        return $this->user_id == $user->id;
    }
}
