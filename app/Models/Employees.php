<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = 'employees';

    protected $fillable = ['id', 'name', 'email', 'company_id'];
    public function company()
    {
        return $this->hasOne('App\Models\Companies', 'id', 'company_id');

    }

}
