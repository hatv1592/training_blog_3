<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    protected $fillable = ['user_id', 'entry_id', 'comment'];

    protected $dates = ['deleted_at'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
