<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WifiNetwork extends Model
{
    protected $fillable = ['name', 'key', 'description', 'active'];
}
