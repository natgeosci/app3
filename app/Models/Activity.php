<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $guarded = []; 

    public function contracts()
    {
        return $this->morphedByMany(Contract::class, 'loggable');
    }

    public function products()
    {
        return $this->morphedByMany(Product::class, 'loggable');
    }

    public function providers()
    {
        return $this->morphedByMany(Provider::class, 'loggable');
    }
}
