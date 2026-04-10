<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BatchAnalysisState extends Model
{
    protected $table = 'batch_analysis_state';
    protected $primaryKey = 'batch_analysis_state_id';
    public $timestamps = false;
    protected $fillable = [
        'created', 
        'createdby', 
        'updated', 
        'updatedby', 
        'isactive', 
        'name', 
        'datefrom', 
        'dateto', 
        'datediif', 
        'batch_analysis_id'
    ];
}
