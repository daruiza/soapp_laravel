<?php

namespace App\Model\Core;

use Carbon\Carbon;
use App\Model\Core\Commerce;
use App\Model\Core\Employee;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = 'reports';
    protected $fillable =
    [
        'id',
        'name',
        'project',
        'progress',
        'responsible',
        'email_responsible',
        'phone_responsible',
        'date',
        'commerce_id',
    ];

    //a varios reportes le Pertenece un comercios
    public function commerce()
    {
        return $this->belongsTo(Commerce::class);
    }

    //a varios reportes le Pertenece varios colaboradores
    public function employee()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function scopeName($query, $name)
    {
        return is_null($name) ?  $query : $query->where('name', 'LIKE', '%' . $name . '%');
    }

    public function scopeCommerceid($query, $commerceid)
    {
        return is_null($commerceid) ?  $query : $query->where('commerce_id', $commerceid);
    }

    public function scopeDate($query, $year, $month)
    {
        return is_null($year) ?  $query : $query->whereBetween('date', [
            Carbon::create(
                $year,
                $month ?? 1,
                1,
                0,
                0,
                0
            )->toDateTimeString(),
            Carbon::create(
                $month ? $year : $year + 1,
                $month ? $month + 1 : 1,
                1,
                0,
                0,
                0
            )->toDateTimeString()
        ]);
    }
}