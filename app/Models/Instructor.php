<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Instructor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "license_number",
        "experience_years",
        "user_id",
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function specialzations()
    {
        return $this->belongsToMany(Specialzation::class, 'instructor_specialzation', 'instructor_id', 'specialzation_id');
    }
}
