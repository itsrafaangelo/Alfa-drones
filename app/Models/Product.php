<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'sku',
        'barcode',
        'description',
        'short_description',
        'price',
        'sale_price',
        'cost_price',
        'stock_quantity',
        'sold_quantity',
        'min_stock_level',
        'images',
        'image_path',
        'specifications',
        'active',
        'featured',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'cost_price' => 'decimal:2',
        'images' => 'array',
        'specifications' => 'array',
        'active' => 'boolean',
        'featured' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getCurrentPriceAttribute()
    {
        return $this->sale_price ?? $this->price;
    }

    public function getProfitMarginAttribute()
    {
        if (!$this->cost_price) {
            return null;
        }
        return (($this->getCurrentPriceAttribute() - $this->cost_price) / $this->cost_price) * 100;
    }

    public function isLowStock()
    {
        return $this->stock_quantity <= $this->min_stock_level;
    }

    public function isOutOfStock()
    {
        return $this->stock_quantity <= 0;
    }

    public function getStockStatusAttribute()
    {
        if ($this->isOutOfStock()) {
            return 'Sem estoque';
        }

        if ($this->isLowStock()) {
            return 'Estoque baixo';
        }

        return 'Em estoque';
    }

    public function scopeActive($query)
    {
        return $query->where('active', true)->where('status', 'ativo');
    }

    public function scopeInStock($query)
    {
        return $query->where('stock_quantity', '>', 0);
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn('stock_quantity', '<=', 'min_stock_level');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'id';
    }
}
