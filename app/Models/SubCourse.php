<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCourse extends Model
{
    use HasFactory;
    public function course()
    {
        return $this->belongsTo(Course::class, 'id');
    }
    public function faqs()
    {
        return $this->hasMany(SubCourseFaq::class);
    }
}
