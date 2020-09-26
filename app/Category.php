<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * Attributes available for assignment
     *
     * @var string[]
     */
    protected $fillable = ['name', 'description', 'parent'];

    /**
     * Count products in the category
     */
    public function countProducts() {
        return $this->belongsToMany(
            Product::class,
            'product_categories',
            'category_id',
            'product_id'
        );
    }

    /**
     * Check if this category is parent
     */
    public function isParent() {
        return ($this->id == $this->parent);
    }

    /**
     * Scope parents categories
     */
    public function scopeParents($query) {
        return $query->whereRaw('id = parent');
    }

    /**
     * Scope childrens categories
     */
    public function scopeChildrens($query) {
        return $query->whereRaw('id != parent');
    }
}
