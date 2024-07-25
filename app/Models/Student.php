<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name', 'nis', 'dob', 'address', 'spp', 'total_paid', 'is_paid'
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // public function updatePaymentStatus()
    // {
    //     $totalPaid = $this->payments()->sum('amount');
    //     $this->total_paid = $totalPaid;
    //     $this->is_paid = $totalPaid >= $this->spp;
    //     $this->save();
    // }
}

