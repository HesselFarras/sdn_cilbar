<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherStaff extends Model
{
    protected $table = 'teachers_staff';
    protected $fillable = ['name', 'role', 'image_url', 'sort_order'];
    public $timestamps = false;
}
