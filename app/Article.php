<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Article extends Model {

    protected $fillable = [
        'title',
        'body',
        'published_at'
    ];

    public function setPublishedAtAttribute($date) {
        $this->attributes['published_at'] = Carbon::createFromFormat('d/m/Y', $date);
    }
    
    public function scopePublished($query){
        $query->where('published_at','<=', Carbon::now());
    }
    
    public function scopeUnpublished($query){
        $query->where('published_at','>', Carbon::now());
    }
}
