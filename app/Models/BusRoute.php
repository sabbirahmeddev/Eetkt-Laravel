<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BusRoute extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'bus_id',
        'from',
        'to',
        'start_time',
        'end_time',
        'seat_cost',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'bus_routes';

    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function To()
    {
        return $this->belongsTo(City::class, 'to');
    }

    public function From()
    {
        return $this->belongsTo(City::class, 'from');
    }
}
