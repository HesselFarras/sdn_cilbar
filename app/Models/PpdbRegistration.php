<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PpdbRegistration extends Model
{
    use HasFactory;

    protected $table = 'ppdb_registrations';

    // Beritahu Eloquent bahwa primary key tabel ini bukan Auto-Increment Integer, melainkan String (UUID)
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'student_name',
        'nik',
        'parent_name',
        'phone_number',
        'email',
        'status'
    ];
}
