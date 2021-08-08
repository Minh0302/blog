<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','short_desc','desc','image','post_category_id'
    ];
    protected $primaryKey = 'id';
    protected $table = 'posts';
    public function category(){
        return $this->belongsTo('App\CategoryPost','post_category_id');
    } 
}
