<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchAnalysisLine extends Model
{
    protected $table = 'batch_analysis_line';
    protected $primaryKey = 'batch_analysis_line_id';
    public $timestamps = false;
    protected $fillable = [
        'created', 'createdby', 
        'updated', 'updatedby', 
        'isactive', 
        'moisture', 
        'temperature',
        'sodium', 
        'protein', 
        'number_batch', 
        'batch_analysis_id'
    ];
}
