<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'car_brand_id',
        'number',
        'image',
        'video',
        'car_driver_id',
        'seat_count',
        'cost',
    ];

    protected $searchableFields = ['*'];

    public function carBrand()
    {
        return $this->belongsTo(CarBrand::class);
    }

    public function carDriver()
    {
        return $this->belongsTo(CarDriver::class);
    }
}
