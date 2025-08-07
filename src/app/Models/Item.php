<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'img',
        'condition_id',
        'itemcategory_id',
        'name',
        'brand',
        'description',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function itemCategory()
    {
        return $this->belongsTo(ItemCategory::class, 'itemcategory_id');
    }

    public function buyItem()
    {
        return $this->hasOne(BuyItem::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function itemCategories()
    {
        return $this->hasMany(ItemCategory::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'item_categories', 'item_id', 'category_id');
    }
}
