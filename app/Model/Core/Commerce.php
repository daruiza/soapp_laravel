<?php

namespace App\Model\Core;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Model\Core\Employee;

class Commerce extends Model
{
    protected $fillable = 
    [
        'id',
        'name',
        'nit',
        'department',
        'city',
        'adress',
        'description',
        'logo',       
        'active'
    ];

    public function scopeActive($query, $active)
    {
        return $active ? 
        $query->where('active', intval($active)) : 
        $query->where('active', 1);        
    }

    public function owner()
    {
        return $this->belongsTo(User::class,  'id', 'commerce_id')->where('rol_id', 2);
    }

    public function employees(){		
        return $this->hasMany(Employee::class);
    }   

}
