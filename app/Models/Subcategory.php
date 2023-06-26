<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Category;

class Subcategory extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
