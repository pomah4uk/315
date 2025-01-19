<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PromotionModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'description',
        'discount_percent',
        'start_date',
        'end_date',
        'status',
        'created_at',
        'updated_at'
    ];
}
