<?php

namespace App\Listeners;

use App\Events\SeriesDeleted;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class RemoveCoverFileSeriesDeleted implements ShouldQueue
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
     * @param  \App\Events\SeriesDeleted  $event
     * @return void
     */
    public function handle(SeriesDeleted $event)
    {
        if (Storage::disk('public')->exists($event->seriesCoverPath)) {
            Storage::disk('public')->delete($event->seriesCoverPath);
        }
    }
}
