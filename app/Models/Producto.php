<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'precio',
        'user_id',
        'categoria_id',
    ];

    // Relación con el usuario
    public function usuario()
{
    return $this->belongsTo(User::class, 'user_id');
}


    // Relación con la categoría (un producto pertenece a una categoría)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
