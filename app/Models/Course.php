<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function program()
    {
        return $this->hasOne(CoursesCategory::class, 'id', 'category_id');
    }
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function subCourses()
    {
        return $this->hasMany(SubCourse::class, 'course_id', 'id');
    }
    public function getAgnCourse()
    {
        return $this->hasMany(AssignCourse::class);
    }
    public function faqs()
    {
        return $this->hasMany(CourseFaq::class);
    }
    public function universities()
    {
        return $this->belongsToMany(University::class, 'assign_courses', 'course_id', 'university_id');
    }

    public function testimonial()
    {
        return $this->hasMany(Testimonial::class);
    }
}
