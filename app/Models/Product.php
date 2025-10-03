<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =[
        'nombre',
        'description',
        'marca',
        'modelo',
        'codigo_product',
        'precio',
        'stock',
        'imagen',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    use HasFactory;
}
