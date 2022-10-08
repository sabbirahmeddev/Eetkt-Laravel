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
        'content',
        'tags',
        'short_description',
        'blog_category_id',
        'status',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class);
    }
}
