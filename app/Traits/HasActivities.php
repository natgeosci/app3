<?php 

namespace App\Traits;

use App\Models\Activity;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasActivities
{
    public function activities(): MorphToMany
    {
        return $this->morphToMany(Activity::class, 'loggable');
    }

    public function syncActivities(array $activities)
    {
        $this->save();
        $this->activities()->sync($activities);
        $this->unsetRelation('activities');
    }

    public function removeActivities()
    {
        $this->activities()->detach();
        $this->unsetRelation('activities');
    }
}