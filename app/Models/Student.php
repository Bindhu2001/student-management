<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'age', 'address', 'gender', 'photo', 'teacher_id'];
    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }
}
