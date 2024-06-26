<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;
use App\Model\Core\Report;
use App\Model\Core\EquipementMaintenanceEvidence;

class EquipementMaintenance extends Model
{
    protected $table = 'equipement_maintenance';
    protected $fillable = [
        'id',
        'buildings',
        'tools',
        'teams',
        'date',
        'observations',
        'approved',
        'report_id',
    ];

    //a varias capacitacions pertenecesn a un reporte
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function equipement_maintenance_evidences()
    {
        return $this->hasMany(EquipementMaintenanceEvidence::class);
    }

    public function scopeReportid($query, $report_id)
    {
        return is_null($report_id) ?  $query : $query->where('report_id', $report_id);
    }
}
