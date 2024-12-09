<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        "total_lessons",
        "completed_lessons",
        "user_id",
        "instructor_id"
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
