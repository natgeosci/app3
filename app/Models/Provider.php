<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;

class Provider extends Model
{
    use LogsActivity;
    
    protected $fillable = [
        'name' 
    ];

    public function contracts() 
    {
        return $this->hasMany(Contract::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
    }
}
