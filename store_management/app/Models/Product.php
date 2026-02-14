<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;
    // Các trường được phép thêm/sửa (Mass Assignment)
    protected $fillable = [
        'store_id',       // <-- Rất hay quên dòng này
        'name',
        'description',
        'price',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
