<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

	use SoftDeletes;

    protected $table = 'posts';

    /**
     * The attributes that are mass assignable.
     *
     */
    protected $fillable = ['title', 'body'];

    /**
     * Dates
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Relationship with Comments
     *
     */
    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }

    /**
     * Relationship with User
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class);	
    }
}
