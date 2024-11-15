<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Opportunity extends Model
{
    //
    use HasFactory;
    protected $table = 'opportunity';

    // Các trường có thể được gán giá trị (mass assignment)
    protected $fillable = [
        'transaction_name',
        'phase',
        'organization',
        'contact',
        'responsible',
        'value',
        'date_closing',
        'telephone',
        'email',
    ];

    // Nếu bạn có thời gian tạo và cập nhật, có thể thêm các thuộc tính này vào
    public $timestamps = true;
}
