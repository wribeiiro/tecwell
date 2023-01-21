<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    /**
     * Undocumented function
     *
     * @param [type] $query
     * @param array $filters
     * @return void
     */
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
                  ->orWhere('description', 'like', '%' . request('search') . '%');
        }
    }

    /**
     * Undocumented function
     *
     * @return HasOne
     */
    public function categories(): HasOne
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
