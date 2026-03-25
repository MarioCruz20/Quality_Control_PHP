<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class ProductionLine extends Model
{

    //Indicarle al modelo que lo vamos a utilizar *(CLASE 6)
    use HasFactory;   

    // 1. Indicamos el nombre verdadero de la tabla
    protected $table = 'production_line';

    // 2. Indicamos el nombre personalizado de la llave primaria
    protected $primaryKey = 'production_line_id';

    // 3. Definimos los campos permitidos para asignación masiva
    protected $fillable = [
        'created',
        'createdby',
        'updated',
        'updatedby',
        'isactive',
        'name',
        'description'
    ];

    // 4. Desactivamos los timestamps automáticos de Laravel (created_at/updated_at)
    // ya que nuestra tabla usa nombres personalizados ('created' y 'updated')
    public $timestamps = false;

    public function products() : HasMany {
    return $this->hasMany(
        Product::class,
        'production_line_id',
        'production_line_id'
    );
}
}
