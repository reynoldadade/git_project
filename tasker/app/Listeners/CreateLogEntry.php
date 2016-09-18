<?php

namespace App\Listeners;

use App\Events\TaskCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\TaskLog;

class CreateLogEntry
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskCreated  $event
     * @return void
     */
    public function handle(TaskCreated $event)
    {
        // this handle function recieves the events properties or variable it will listen and recieve the data from its event automatically so no need to parse any variable through the method

        $author = $event->author; //value from the event is saved in the author variable
        $log_entry = new TaskLog(); //a new object of the TaskLog model is created;
        $log_entry->author= $author; //we are then able to access the tasklog property of author and store the $author into the author column
        $log_entry->save(); //then we save the data into the database; all this is done by the eloquent model.

        
    }
}
