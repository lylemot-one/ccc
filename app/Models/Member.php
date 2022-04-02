<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $primaryKey = 'coop_MID';
    protected $table = 'members';
    public $timestamps = true;
    protected $guarded = [ 'coop_MID', 'created_at', 'updated_at'];

    /**
    * Get the route key for the model.
    *
    * @return string
    */
    public function getRouteKeyName()
    {
        return 'coop_MID';
    }
}
