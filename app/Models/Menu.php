<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'restaurant_id',
        'name',
        'slug',
        'description',
        'active'
    ];
    
    protected $casts = [
        'active' => 'boolean'
    ];
    
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }
    
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
}