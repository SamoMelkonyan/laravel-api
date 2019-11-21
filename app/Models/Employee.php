<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name', 'last_name' , 'companies_id' , 'email', 'phone'
    ];
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'companies_id', 'id');
    }
}
