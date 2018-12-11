<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'name',
        'description',
        'logo_url',
        'url',
        'library',
        'open_source',
    ];

    /**
     * Get the company that owns the product.
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * The categories that belong to the product.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->loadMissing('company', 'categories')->toArray();

        // Customize array...

        return $array;
    }

    /**
     * Get the index name for the model.
     *
     * @return string
     */
    public function searchableAs()
    {
        return 'libraryappcenter';
    }

}
