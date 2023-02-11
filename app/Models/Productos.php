<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Productos extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'productos';
    protected $fillable = [
        "nombre_producto",
        "referencia",
        "categoria",             
        "precio",
        "peso",
        "stock"
    ];

    public function getCreatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i');
    }
    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        return $date->format('Y-m-d H:i');
    }
}
