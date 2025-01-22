<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $fillable = [
        'id',
        'name',
        'address',
        'phone',
        'description',
        'email',
        'social_media',
        'working_hours',
        'created_at',
        'updated_at'];
}
