<?php

namespace App\Models;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table='carts';
    protected $fillable=[
        'user_id',
        'product_id',
        'product_color_id',
          'product_variant_id',
        'quantity',
    ];
    public function productVariant(): BelongsTo
{
    return $this->belongsTo(ProductVariant::class, 'product_variant_id', 'id');
}
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }
    public function productColor(): BelongsTo
    {
        return $this->belongsTo(ProductColor::class, 'product_color_id','id');
    }
}
