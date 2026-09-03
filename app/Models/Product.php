<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [

        'category_id',

        'name',

        'slug',

        'description',

        'original_price',
  'discount_percentage',
        'selling_price',

        'quantity',

        'featured',

        'status',

    ];
protected $casts = [
    'original_price' => 'decimal:2',
    'discount_percentage' => 'decimal:2',
    'selling_price' => 'decimal:2',
];

    /*
    |--------------------------------------------------------------------------
    | Category
    |--------------------------------------------------------------------------
    */

    public function category()
    {
        return $this->belongsTo(
            Category::class,
            'category_id',
            'id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Product Images
    |--------------------------------------------------------------------------
    */

    public function productImages()
    {
        return $this->hasMany(
            ProductImage::class,
            'product_id',
            'id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Product Variants
    |--------------------------------------------------------------------------
    */

    public function productVariants()
    {
        return $this->hasMany(
            ProductVariant::class,
            'product_id',
            'id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | OLD Product Colors
    |--------------------------------------------------------------------------
    |
    | Keep this temporarily if your database still contains
    | old ProductColor records.
    |
    */

    public function productColors()
    {
        return $this->hasMany(
            ProductColor::class,
            'product_id',
            'id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Order Items
    |--------------------------------------------------------------------------
    */

    public function orderItems()
    {
        return $this->hasMany(
            OrderItem::class,
            'product_id',
            'id'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Total Sold
    |--------------------------------------------------------------------------
    */

    public function getTotalSoldAttribute()
    {
        return $this->orderItems()
            ->sum('quantity');
    }


    /*
    |--------------------------------------------------------------------------
    | Order Item Count
    |--------------------------------------------------------------------------
    */

    public function getOrderItemCountAttribute()
    {
        return $this->orderItems->count();
    }


    /*
    |--------------------------------------------------------------------------
    | Instagram Feeds
    |--------------------------------------------------------------------------
    */

    public function instaFeeds()
    {
        return $this->hasMany(
            InstagramFeed::class,
            'product_id',
            'id'
        );
    }
}