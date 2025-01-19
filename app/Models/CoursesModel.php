<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CoursesModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'duration',
        'price',
        'status',
        'created_at',
        'updated_at'
    ];
}
