<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use App\Traits\HasActivities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes, RecordsActivity, HasActivities;
    
    protected $fillable = [
        'name' 
    ];

    protected static $recordEvents = [
        'created',
        'updated', 
        'deleted'
    ];

    public function contracts() 
    {
        return $this->hasMany(Contract::class);
    }
}
