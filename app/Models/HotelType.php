<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelType extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'star'];

    protected $searchableFields = ['*'];

    protected $table = 'hotel_types';

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
