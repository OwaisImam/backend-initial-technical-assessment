<?php
namespace App\Tasks;

use App\Models\GuestbookEntry;

class PerformCleanupTasks
{
    protected $entry;

    public function __construct(GuestbookEntry $entry)
    {
        $this->entry = $entry;
    }

    public function handle()
    {
        // here we perfom the cleanup task, like delete the relative record from the different associated tables.
    }
}