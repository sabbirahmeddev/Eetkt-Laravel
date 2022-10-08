<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insurance extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['name', 'description', 'insurance_agency_id'];

    protected $searchableFields = ['*'];

    public function insuranceAgency()
    {
        return $this->belongsTo(InsuranceAgency::class);
    }
}
