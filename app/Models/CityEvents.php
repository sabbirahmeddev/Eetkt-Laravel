<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CityEvents extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'image',
        'description',
        'event_type_id',
        'city_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'city_events';

    public function eventType()
    {
        return $this->belongsTo(EventType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
