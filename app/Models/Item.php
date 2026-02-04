<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'allergens',
        'available'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'available' => 'boolean'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function modifiers()
    {
        return $this->belongsToMany(Modifier::class, 'item_modifier');
    }
}