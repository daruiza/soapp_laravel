<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evidence extends Model
{
    protected $table = 'evidences';
    protected $fillable = [
        'id',        
        'name',
        'file',
        'type',
        'approved',
        'employee_report_id'        
    ];
}