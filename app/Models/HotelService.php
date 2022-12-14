<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelService extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['hotel_id', 'name', 'cost'];

    protected $searchableFields = ['*'];

    protected $table = 'hotel_services';

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
}
