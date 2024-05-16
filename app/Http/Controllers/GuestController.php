<?php

namespace App\Http\Controllers;

use App\Models\GuestbookEntry;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        $entries = GuestbookEntry::all();
        return view('index', ["entries" => $entries]);
    }

    public function submitForm()
    {
        return view('form');
    }
}