<?php
namespace App\Tasks;

use App\Jobs\GenerateReportJob;
use App\Models\GuestbookEntry;

class GenerateNewReport
{
    protected $entry;

    public function __construct(GuestbookEntry $entry)
    {
        $this->entry = $entry;
    }

    public function handle()
    {
        return GenerateReportJob::dispatch();
    }
}