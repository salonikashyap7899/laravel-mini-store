<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category', 'image'];

    // Scope for filtering
    public function scopeFilter($query, array $filters)
    {
        if ($filters['category'] ?? false) {
            $query->where('category', $filters['category']);
        }
        if ($filters['min_price'] ?? false) {
            $query->where('price', '>=', $filters['min_price']);
        }
        if ($filters['max_price'] ?? false) {
            $query->where('price', '<=', $filters['max_price']);
        }
    }
}