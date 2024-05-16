<?php

namespace App\Http\Controllers;

use App\Models\GuestbookEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

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

    public function submit(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255',
                'email' => 'required|email',
                'content' => 'nullable',
            ]);

            if($validator->fails()) {
                return redirect()->back()->withErrors($validator->messages())->withInput();
            }
            $data = $validator->validated();

            GuestbookEntry::create($data);

            DB::commit();
            return redirect()->route('index')->with('success', 'Data uploaded successfully.');

        }catch(\Exception $e) {
            DB::rollBack();
            Log::error($e);
            return redirect()->back()->with('error', 'Something went wrong.');

        }
    }
}