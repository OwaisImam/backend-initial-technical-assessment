<?php

use App\Events\GuestbookEntryDeleting;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\GuestbookEntry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Routes for the guestbook API
 */
Route::group([
    'prefix' => '/guestbook',
    'as' => 'guestbook.',
], function () {
    Route::get('/', [
        'as' => 'index',
        function (Request $request) {
            return GuestbookEntry::all();
        },
    ]);

    Route::get('/my', [
        'as' => 'my',
        function (Request $request) {
            if ($request->user() === null)
                return response("Not logged in", 401);

            return GuestbookEntry::where([
                "user_id" => $request->user()?->id
            ])->get();
        },
    ]);

    Route::get('/{entry}', [
        'as' => 'get',
        function (GuestbookEntry $entry) {
            return $entry;
        },
    ]);

    Route::delete('/{entry}', [
        'as' => 'delete',
        function (GuestbookEntry $entry) {

            event(new GuestbookEntryDeleting($entry));

            $entry->delete();

            return response("Deleted");
        },
    ]);

    Route::post('/sign', [
        'as' => 'sign',
        'middleware' => [\App\Http\Middleware\JsonContentType::class],
        function (Request $request) {
            $entry = GuestbookEntry::create([
                'title'                  => $request->title,
                'content'                => $request->content,
                'user_id'                => Auth::user()->id,
            ]);

            return $entry;
        },
    ]);

    Route::put('/update/{id}', [
        'as' => 'updateRecord',
        'middleware' => [\App\Http\Middleware\JsonContentType::class],
        function (Request $request) {
            $entry = GuestbookEntry::where('id', $request->id)->where('user_id', Auth::user()->id)->update([
                'title'                  => $request->title,
                'content'                => $request->content,
            ]);
            if(!$entry)
            {
                return response("Invalid entry id", 500);
            }
            return $entry;
        },
    ]);
});