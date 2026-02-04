<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Modifier extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'price',
        'available'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'available' => 'boolean'
    ];
    
    public function items()
    {
        return $this->belongsToMany(Item::class, 'item_modifier');
    }
}