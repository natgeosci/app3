<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, RecordsActivity;
    
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
        return $this->belongsToMany(Contract::class);
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}           
