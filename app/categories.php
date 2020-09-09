<?php

namespace App;

use Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class categories extends Model
{
    protected $table = 'category';
    protected $fillable = [
        'id','cat_title','cat_slug','cat_description','parent_id','user_id'
    ];
    public function parent() {
        return $this->belongsTo(categories::class);
    }
}
