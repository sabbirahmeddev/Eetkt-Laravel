<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'image', 'country_id', 'description'];

    protected $searchableFields = ['*'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function allCityEvents()
    {
        return $this->hasMany(CityEvents::class);
    }

    public function busRouteFrom()
    {
        return $this->hasMany(BusRoute::class, 'from');
    }

    public function busRouteTo()
    {
        return $this->hasMany(BusRoute::class, 'to');
    }

    public function cityCategory()
    {
        return $this->hasMany(CityCategory::class);
    }

    public function destinationBlogs()
    {
        return $this->hasMany(DestinationBlog::class);
    }

    public function holidays()
    {
        return $this->hasMany(Holiday::class);
    }
}
