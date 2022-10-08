<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['property', 'value', 'type', 'setting_group_id'];

    protected $searchableFields = ['*'];

    public function settingGroup()
    {
        return $this->belongsTo(SettingGroup::class);
    }
}
