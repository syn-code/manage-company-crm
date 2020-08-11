<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['first_name', 'last_name', 'company_id', 'email', 'phone'];

    protected $appends = ['full_name'];


    public function getFullNameAttribute()
    {
        return $this->attributes['full_name'] =  $this->first_name . ' ' . $this->last_name;
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
