<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'logo', 'website'];

    public static function getAll()
    {
        return  DB::table('companies')->paginate(5);

    }
}
