<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Characteristic extends Model
{
    use SoftDeletes;

    /**
     * Attributes available for assignment
     *
     * @var string[]
     */
    protected $fillable = ['name'];

    /**
     * Count products linked to the characteristic
     */
    public function countProducts() {
        return $this->belongsToMany(
            Product::class,
            'product_categories',
            'category_id',
            'product_id'
        );
    }
}
