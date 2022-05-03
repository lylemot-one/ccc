<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;
    protected $table = 'dependents';
    public $timestamps = true;
    protected $guarded = [ 'coop_MID', 'created_at', 'updated_at'];
}
