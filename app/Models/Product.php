<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'badge',
        'price',
        'compare_at_price',
        'stock',
        'description',
        'image',
        'is_active',
        'featured',
    ];

    protected $casts = [
        'price' => 'float',
        'compare_at_price' => 'float',
        'stock' => 'integer',
        'is_active' => 'boolean',
        'featured' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getFormattedPriceAttribute(): string
    {
        return '$' . number_format($this->price, 2);
    }

    public function getFormattedCompareAtPriceAttribute(): ?string
    {
        return $this->compare_at_price ? '$' . number_format($this->compare_at_price, 2) : null;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->image && str_starts_with($this->image, 'http')) {
            return $this->image;
        }

        if ($this->image && file_exists(public_path('assets/images/products/' . $this->image))) {
            return asset('assets/images/products/' . $this->image);
        }

        return asset('assets/images/products/vape-midnight-ice.jpg');
    }
}
