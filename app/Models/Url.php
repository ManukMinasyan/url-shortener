<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'long_url',
        'short_url'
    ];

    /**
     * @param $query
     * @param $url
     * @return mixed
     */
    public function scopeSearchByLongUrl($query, $url) {
        return $query->where('long_url', $url);
    }

    /**
     * @param $query
     * @param $url
     * @return mixed
     */
    public function scopeSearchByShortUrl($query, $url) {
        return $query->where('short_url', $url);
    }
}
