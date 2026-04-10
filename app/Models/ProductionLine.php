<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductionLine extends Model
{
    use HasFactory;

    protected $table = 'production_line';
    protected $primaryKey = 'production_line_id';
    public $timestamps = false;
    protected $fillable = [
        'created', 
        'createdby', 
        'updated', 
        'updatedby', 
        'isactive', 
        'name', 
        'description'
    ];

    // Al hacer esto, Laravel convertirá automáticamente el string de MySQL 
    // a un objeto Carbon cada vez que lo consultemos.
    protected $casts = [
        'created' => 'datetime',
        'updated' => 'datetime',
    ];

    // indico que voy a obtener todos los productos
    // que pertecen a la linea de produccion
    public function products(): HasMany {
        return $this->hasMany(Product::class,'production_line_id', 'production_line_id');
    }
}
