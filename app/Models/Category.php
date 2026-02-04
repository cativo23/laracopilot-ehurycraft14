<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'menu_id',
        'name',
        'description',
        'sort_order',
        'active'
    ];
    
    protected $casts = [
        'sort_order' => 'integer',
        'active' => 'boolean'
    ];
    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
    
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}