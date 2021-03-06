<?php
/**
 * Created by PhpStorm.
 * User: siemengijbels
 * Date: 12/5/17
 * Time: 3:18 PM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'content', 'image', 'user_id'];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag', 'post_tags', 'post_id', 'tag_id')->withTimestamps();
    }

    public function likes() {
        return $this->hasMany('App\Like', 'post_id');
    }

}