<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SlugsModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'slug',
        'type',
        'created_at',
        'updated_at'
    ];
}
