<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialzation extends Model
{
    use HasFactory;

    protected $fillable = [
        'specialzation_name',
        'is_active'
    ];

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class, 'instructor_specialization');
    }

    public $attributes = [
        'is_active' => 0
    ];
}
