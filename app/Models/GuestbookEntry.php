<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestbookEntry extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'title',
        'content',
        'submitter_email',
        'submitter_display_name',
        'submitter_real_name',
    ];
}
