<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Hash;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];

    protected $hidden = ['password', 'remember_token'];

    public function entries() {
        return $this->hasMany(Entry::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function followers() {
        return $this->hasMany(Relationship::class, 'following_id');
    }

    public function followings() {
        return $this->hasMany(Relationship::class, 'follower_id');
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }
}
