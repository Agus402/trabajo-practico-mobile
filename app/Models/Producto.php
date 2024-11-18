<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Producto extends Model
{
    protected $fillable = ['nombre', 'descripcion', 'precio', 'disponible', 'fecha_lanzamiento', 'categoria_id'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}

