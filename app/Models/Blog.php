<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
