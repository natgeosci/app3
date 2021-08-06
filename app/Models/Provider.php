<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use App\Traits\ActivityScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes, RecordsActivity, ActivityScope;
    
    protected $fillable = [
        'name' 
    ];

    public function contracts() 
    {
        return $this->hasMany(Contract::class);
    }
}
