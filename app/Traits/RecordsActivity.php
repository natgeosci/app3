<?php

namespace App\Traits;

use App\Models\Activity;

trait RecordsActivity
{
    /**
     * Register the necessary event listeners.
     *
     * @return void
     */
    protected static function bootRecordsActivity()
    {
        foreach (static::getModelEvents() as $event)                                    
            static::$event(fn ($model) => $model->recordActivity($event));
    }                                                

    /**
     * Record activity for the model.
     *
     * @param  string $event
     * @return void
     */
    public function recordActivity($event)
    {
        $this->activities()->create([
            'name' => $this->getActivityName($this, $event), 
        ]);
    }

    /**
     * Prepare the appropriate activity name.
     *
     * @param  mixed  $model
     * @param  string $action
     * @return string
     */
    protected function getActivityName($model, $action)
    {
        $name = strtolower(class_basename($model)); 

        return "{$action}_{$name}";
    }

    /**
     * Get the model events to record activity for.
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        return static::$recordEvents ?? [
            'created', 'updated', 'deleted'
        ];
    }

    public function activities()
    {
        return $this->morphMany(Activity::class, 'subject');
    }
}
