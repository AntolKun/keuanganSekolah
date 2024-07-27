<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'nis', 'dob', 'address', 'spp', 'total_paid', 'is_paid', 'academic_year_id'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class);
    }
}


