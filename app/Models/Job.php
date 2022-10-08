<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'image',
        'title',
        'description',
        'job_category_id',
        'job_sub_category_id',
    ];

    protected $searchableFields = ['*'];

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function jobSubCategory()
    {
        return $this->belongsTo(JobSubCategory::class);
    }
}
