<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'subdomain',
        'email',
        'phone',
        'address',
        'description',
        'active'
    ];
    
    protected $casts = [
        'active' => 'boolean'
    ];
    
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}