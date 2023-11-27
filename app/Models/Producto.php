<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'imagen', 'categoria_id','descripcion', 'precio'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
