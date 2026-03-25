<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    protected $fillable = [
        'created',
        'createdby',
        'updated',
        'isactive',
        'name',
        'code',
        'picture',
        'production_line_id'
    ];

    public function productionLine(): BelongsTo
    {
        return $this->belongsTo(
            ProductionLine::class,
            'production_line_id',
            'production_line_id'
        );
    }
}