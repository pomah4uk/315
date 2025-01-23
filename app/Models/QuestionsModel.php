<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsModel extends Model
{
    protected $fillable = [
        'id',
        'question',
        'answer',
        'created_at',
        'updated_at',
    ];
}
