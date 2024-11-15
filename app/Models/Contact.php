<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'contact_name',
        'email',
        'telephone',
        'responsible',
        'tag',
    ];

    public $timestamps = true;
}
