<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'content',
        'hits',
        'starts_at',
        'ends_at',
    ];

    /**
     * The attributes that are converted to Carbon dates.
     *
     * @var array
     */
    protected $dates = [
        'starts_at',
        'ends_at',
    ];

    /**
     * The categories that belong to the ad.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
