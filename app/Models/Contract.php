<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use App\Traits\ActivityScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    use SoftDeletes, RecordsActivity, ActivityScope;

    protected $fillable = [
        'name', 
        'provider_id' 
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
