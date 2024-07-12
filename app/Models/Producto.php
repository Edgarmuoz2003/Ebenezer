<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo', 'imagen', 'precio', 'descripcion', 'categoria', 'tallas_disponibles', 'destacado', 'enOferta'
    ];

    protected $casts = [
        'tallas_disponibles' => 'json',
    ];
}

