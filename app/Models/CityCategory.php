<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CityCategory extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['city_id'];

    protected $searchableFields = ['*'];

    protected $table = 'city_categories';

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
