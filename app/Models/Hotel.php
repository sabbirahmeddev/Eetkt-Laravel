<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['Name', 'hotel_type_id'];

    protected $searchableFields = ['*'];

    public function hotelType()
    {
        return $this->belongsTo(HotelType::class);
    }

    public function hotelFacilities()
    {
        return $this->hasMany(HotelFacility::class);
    }

    public function hotelServices()
    {
        return $this->hasMany(HotelService::class);
    }
}
