<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visa extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['country_id'];

    protected $searchableFields = ['*'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
