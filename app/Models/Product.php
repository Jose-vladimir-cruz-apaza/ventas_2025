<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id',
        'categorie_id',
        'provider_id',
        'name',
        'description',
        'cod_prod',
        'specifications',
        'stock_minimum',
        'stock',
        'imagen_url',
        'brand',
        'cant',
        'price',
        'discount',
        'active',
    ];

    // Relaciones
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categorie_id');
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
