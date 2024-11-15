<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Tag extends Model
{
    //
    use HasFactory;

    protected $table = 'tag';

    protected $fillable = [
        'name',
        'color',
    ];

    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'contact_tag');
    }
}
