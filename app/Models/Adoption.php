<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    // Tambahkan 'user_id' ke dalam $fillable
    protected $fillable = [
        'user_id',
        'product_name',
        'price',
        'address',
        'cod_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}