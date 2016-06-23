<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Relationship extends Model
{
    use SoftDeletes;

    protected $table = 'relationships';

    protected $fillable = ['following_id', 'follower_id'];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsToMany(User::class);
    }
}
