<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'image',
        'description',
        'tags',
        'blog_category_id',
    ];

    protected $searchableFields = ['*'];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
