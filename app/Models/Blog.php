<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public function categories()
    {
        return $this->hasOne(BlogCategory::class, 'id', 'category_id');
    }
    public function faqs()
    {
        return $this->hasMany(BlogFaq::class);
    }
}
