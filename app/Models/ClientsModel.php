<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientsModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'email',
        'phone',
        'status',
        'created_at',
        'updated_at'
    ];
}
