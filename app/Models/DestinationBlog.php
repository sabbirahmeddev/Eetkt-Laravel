<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DestinationBlog extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'image',
        'title',
        'description',
        'tags',
        'status',
        'city_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'destination_blogs';

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
