<?php

namespace App;

use App\Category;
use App\Characteristic;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    /**
     * Attributes available for assignment
     *
     * @var string[]
     */
    protected $fillable = ['name', 'description', 'price_htva', 'price_ttc', 'stock'];


    /**
     * Add categories to the product
     *
     * @param $categories array Array of categories ID
     */
    public function addCategories($categories) {
        foreach ($categories as $category) {
            // Category relation
            $this->categories()->attach($category);
        }
    }

    /**
     * Add characteristics to this product
     *
     * @param $characteristics array of characteristics ID
     */
    public function addCharacteristics($characteristics) {
        foreach ($characteristics as $characteristic) {
            // Characteristic relation
            $this->characteristics()->attach($characteristic);
        }
    }

    /**
     * Remove all product categories
     */
    public function resetCategories() {
        $this->categories()->detach();
    }

    /**
     * Remove all product characteristics
     */
    public function resetCharacteristics() {
        $this->characteristics()->detach();
    }

    /**
     * Create a new category and add it to the product
     *
     * @param $category string The category name to add
     */
    public function addToNewCategory($category) {
        $new_category = Category::create([
            'name' => $category,
            'description' => ''
        ]);
        $new_category->parent = $new_category->id;
        $new_category->save();
        $this->categories()->attach($new_category->id);
    }

    /**
     * Create a new characteristic and add it to the product
     *
     * @param $characteristic string The charactiristic name to add
     */
    public function addToNewCharacteristic($characteristic) {
        $new_characteristic = Characteristic::create([
            'name' => $characteristic
        ]);
        $this->characteristics()->attach($new_characteristic->id);
    }

    /**
     * Increment the product's stock quantity
     */
    public function incrementStock() {
        $this->stock++;
        $this->save();
    }

    /**
     * Decrement the product's stock quantity
     */
    public function decrementStock() {
        if(--$this->stock < 0)
            $this->stock = 0;
        $this->save();
    }

    /**
     * Categories relation
     *
     * @return BelongsToMany
     */
    public function categories()
    {
        return $this->belongsToMany(
            Category::class,
            'product_categories',
            'product_id',
            'category_id'
        );
    }

    /**
     * Characteristics relation
     *
     * @return BelongsToMany
     */
    public function characteristics()
    {
        return $this->belongsToMany(
            Characteristic::class,
            'product_characteristics',
            'product_id',
            'characteristic_id'
        );
    }
}
