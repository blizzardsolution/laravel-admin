<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    protected $fillable = ['id', 'name', 'address', 'logo', 'path'];
}
