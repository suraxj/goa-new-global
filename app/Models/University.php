<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    public function faqs()
    {
        return $this->hasMany(UniversityFaq::class);
    }
    public function approvals()
    {
        return $this->belongsToMany(Approval::class, 'assign_approvals', 'university_id', 'approval_id');
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'assign_courses', 'university_id', 'course_id');
    }
    public function mode()
    {
        return $this->hasOne(UniversityMode::class, 'id', 'mode_id');
    }
}
