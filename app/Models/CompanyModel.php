<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $fillable = ['id', 'name', 'email', 'phone', 'status', 'created_at', 'updated_at'];
}
