<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function($post) {
            $post->slug = $post->createSlug();
        });
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function createSlug()
    {
        $parentSlug = $this->parent ? $this->parent->slug . '/' : '';
        return $parentSlug . $this->convertToSlug($this->name);
    }

    public function convertToSlug($string)
    {
        $string = strtolower(trim($string));
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);

        return $string;
    }
}
