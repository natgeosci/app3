<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use App\Traits\HasActivities;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes, RecordsActivity, HasActivities;

    protected $fillable = [
        'name', 
        'provider_id' 
    ]; 

    protected static $recordEvents = [
        'created',
        'updated', 
        'deleted'
    ];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
