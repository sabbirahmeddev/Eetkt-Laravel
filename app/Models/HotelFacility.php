<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelFacility extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'hotel_id'];

    protected $searchableFields = ['*'];

    protected $table = 'hotel_facilities';

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
