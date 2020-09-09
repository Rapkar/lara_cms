<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class posts extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','post_title','post_content','post_author','post_status','comment_status','post_views','post_views'
    ];
}
