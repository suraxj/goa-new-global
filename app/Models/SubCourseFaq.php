<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCourseFaq extends Model
{
    use HasFactory;
    public function subCourse()
    {
        return $this->belongsTo(SubCourse::class);
    }
}
