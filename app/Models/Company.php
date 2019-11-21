<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name', 'email', 'logo', 'website'
    ];
    public function employees()
    {
        return $this->hasMany('App\Models\Employee', 'companies_id', 'id');
    }
}
