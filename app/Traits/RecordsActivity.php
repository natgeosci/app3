<?php

namespace App\Traits;

use App\Models\Activity;
use ReflectionClass;

trait RecordsActivity
{
    /**
     * Register the necessary event listeners.
     *
     * @return void
     */
    protected static function bootRecordsActivity()
    {
        foreach (static::getModelEvents() as $event) {      // PHP Manual - Anonymous functions
            static::$event(function ($model) use ($event) { // * Note: $model = Closures can also accept regular arguments
                $model->recordActivity($event);             // * Note: use = Inheriting variables from the parent scope (Closures may also inherit variables from the parent scope) =>
            });                                             // => It simply makes the specified variables of the outer scope available inside the closure.
        }                                                   // * Note: :: = scope resolution operator
    }                                                

    /**
     * Record activity for the model.
     *
     * @param  string $event
     * @return void
     */
    public function recordActivity($event)
    {
        Activity::create([
            'subject_id' => $this->id,
            'subject_type' => get_class($this), // get_class() = Returns the name of the class of an object => get_class(object $object = ?): string
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
        $name = strtolower((new ReflectionClass($model))->getShortName()); 

        return "{$action}_{$name}";
    }

    /**
     * Get the model events to record activity for.
     *
     * @return array
     */
    protected static function getModelEvents()
    {
        if (isset(static::$recordEvents)) {
            return static::$recordEvents;
        }

        return [
            'created', 'updated', 'deleted'
        ];
    }
}
