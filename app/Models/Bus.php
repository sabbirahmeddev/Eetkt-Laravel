<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bus extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'model'];

    protected $searchableFields = ['*'];

    public function busRoutes()
    {
        return $this->hasMany(BusRoute::class);
    }
}
