<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $table = 'comments';

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = ['user_id', 'post_id', 'comment', 'parent_id'];

    /**
     * Dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Relationship with User
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Comment
     *
     */
    public function reply()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
