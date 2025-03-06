<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_comprador',
        'id_vendedor',
        'producto_id',
        'total',
    ];

    public function comprador()
{
    return $this->belongsTo(User::class, 'id_comprador', 'id');
}

public function vendedor()
{
    return $this->belongsTo(User::class, 'id_vendedor', 'id');
}

public function producto()
{
    return $this->belongsTo(Producto::class, 'producto_id', 'id');
}
}
