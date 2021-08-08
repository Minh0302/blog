<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $fillable = [
        'title'
    ];
    protected $primaryKey = 'id';
    protected $table = 'category_posts';
    public function post(){
        return $this->hasMany('App\Post');
    }
}
