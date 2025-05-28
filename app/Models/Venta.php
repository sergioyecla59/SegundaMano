<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = ['producto', 'precio', 'cantidad', 'total', 'titular', 'producto_id'];

    public function producto()
{
    return $this->belongsTo(Producto::class, 'producto_id');
}




}
