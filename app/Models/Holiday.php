<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holiday extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['title', 'image', 'description', 'cost', 'city_id'];

    protected $searchableFields = ['*'];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
