<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'company_id',
        'email',
        'phone'
    ];

    //TODO make a mote on $cast property
    //this will cast the created_at to the specified format
    protected $cast = [
      'created_at' => 'datetime:d/m/Y H:i:s'
    ];

    //appends dynamic attributes to the model when converted to json or array
    protected $appends = ['full_name', 'start_date'];


    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getStartDateAttribute()
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    public function company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
