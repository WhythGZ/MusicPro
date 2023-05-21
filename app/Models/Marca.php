<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table = "marcas";
    protected $fillable = ["nombreMarca", "activo"];
    public $timestamps = false;
}
