<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoursesCategory extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class, 'category_id', 'id');
    }
}
