<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'quantity',
        // Thêm các trường khác nếu cần
    ];

    // Định nghĩa mối quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
