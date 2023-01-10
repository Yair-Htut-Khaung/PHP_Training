<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class joinstudentmajor extends Model
{
    protected $fillable = ['student_id', 'major_id'];
    use HasFactory;
}
