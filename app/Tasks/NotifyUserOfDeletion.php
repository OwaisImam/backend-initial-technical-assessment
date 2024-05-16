<?php
namespace App\Tasks;

use App\Models\GuestbookEntry;

class NotifyUserOfDeletion
{
    protected $entry;

    public function __construct(GuestbookEntry $entry)
    {
        $this->entry = $entry;
    }

    public function handle()
    {
        // here we handle to notify the suers by sending an email or nofitication
    }
}