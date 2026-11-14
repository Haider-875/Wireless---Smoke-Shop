<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepairInquiry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'device_model',
        'service_needed',
        'inquiry_type',
        'product_id',
        'notes',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
