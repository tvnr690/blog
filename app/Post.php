<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['p_title', 'p_slug', 'category_id', 'location', 'p_image', 'p_content', 'p_author'];

}
