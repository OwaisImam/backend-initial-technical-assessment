<?php

namespace App\Events;

use App\Models\GuestbookEntry;
use App\Tasks\GenerateNewReport;
use App\Tasks\NotifyUserOfDeletion;
use App\Tasks\PerformCleanupTasks;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class GuestbookEntryDeleting
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    protected GuestbookEntry $entry;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(GuestbookEntry $entry)
    {
        $this->entry = $entry;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function handle()
    {
        Log::info("event dispatched");
        (new NotifyUserOfDeletion($this->entry))->handle();
        (new GenerateNewReport($this->entry))->handle();

        (new PerformCleanupTasks($this->entry))->handle();
    }
}