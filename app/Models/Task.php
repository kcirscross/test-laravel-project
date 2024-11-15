<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    //
    use HasFactory;

    protected $table = 'task';

    protected $fillable = [
        'title',
        'due_date',
        'email',
        'opportunity',
        'contact',
        'manager',
        'accomplished',
        'status',
    ];

    protected $casts = [
        'due_date' => 'date',
        'accomplished' => 'boolean',
    ];
}
